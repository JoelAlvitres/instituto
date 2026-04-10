document.addEventListener('DOMContentLoaded', function () {
  console.log('Inicializando chat con funcionalidad de voz...');

  // ===== ELEMENTOS DEL DOM =====
  const chatButton = document.getElementById('chatButton');
  const chatWindow = document.getElementById('chatWindow');
  const chatClose = document.getElementById('chatClose');
  const chatInput = document.getElementById('chatInput');
  const chatSend = document.getElementById('chatSend');
  const chatBody = document.getElementById('chatBody');

  let voiceButton = null;
  let stopVoiceButton = null;
  let voiceStatus = null;
  let cancelVoice = null;

  if (!chatButton || !chatWindow) {
    console.error('Faltan elementos esenciales del chat');
    return;
  }

  // ===== VARIABLES DE ESTADO =====
  let isOpen = false;
  let isRecording = false;
  let recognition = null;
  let voiceSupported = false;
  let isSpeaking = false;

  // ===== INICIALIZAR API DE VOZ =====
  function initVoiceAPI() {
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    if (SpeechRecognition) {
      recognition = new SpeechRecognition();
      recognition.continuous = false;
      recognition.interimResults = true;
      recognition.lang = 'es-PE';

      recognition.onresult = handleSpeechResult;
      recognition.onerror = handleSpeechError;
      recognition.onend = handleSpeechEnd;

      voiceSupported = true;
      console.log('Reconocimiento de voz disponible');
    }
  }
  function handleSpeechResult(event) {
    const transcript = Array.from(event.results).map(result => result[0].transcript).join('');
    const isFinal = event.results[0].isFinal;
    if (chatInput && transcript) {
      const cleanTranscript = (transcript || '').toString();
      if (cleanTranscript.toLowerCase() !== 'null') { chatInput.value = cleanTranscript; }
      if (isFinal && cleanTranscript.trim().length > 0) { enviarMensaje(); stopRecording(); }
    }
    if (voiceStatus) {
      const statusText = voiceStatus.querySelector('span:not(.voice-indicator)');
      if (statusText) { statusText.textContent = isFinal ? 'Procesando...' : 'Escuchando...'; }
    }
  }

  function handleSpeechError(event) {
    console.error('Error de voz:', event.error);
    let errorMessage = 'Error al reconocer la voz';
    if (event.error === 'not-allowed') errorMessage = 'Permite el acceso al micrófono';
    else if (event.error === 'no-speech') errorMessage = 'No se detectó voz';
    showTemporaryMessage(errorMessage);
    stopRecording();
  }

  function handleSpeechEnd() { stopRecording(); }

  function startRecording() {
    if (!voiceSupported || !recognition) return;
    if (isRecording) return;
    stopSpeaking();
    try {
      recognition.start();
      isRecording = true;
      if (voiceButton) voiceButton.classList.add('recording');
      if (voiceStatus) voiceStatus.style.display = 'flex';
    } catch (error) { console.error('Error recording:', error); }
  }

  function stopRecording() {
    if (!isRecording || !recognition) return;
    try { recognition.stop(); } catch (error) { console.error('Error stop recording:', error); }
    isRecording = false;
    if (voiceButton) voiceButton.classList.remove('recording');
    if (voiceStatus) voiceStatus.style.display = 'none';
  }
  function stopSpeaking() {
    if ('speechSynthesis' in window) {
      window.speechSynthesis.cancel();
      isSpeaking = false;
      if (stopVoiceButton) stopVoiceButton.style.display = 'none';
    }
  }

  function speakText(text) {
    if (!('speechSynthesis' in window)) return;
    stopSpeaking();
    if (!text || text.trim() === '') return;
    const utterance = new SpeechSynthesisUtterance(text);
    utterance.lang = 'es-PE';
    utterance.onstart = () => { isSpeaking = true; if (stopVoiceButton) stopVoiceButton.style.display = 'flex'; };
    utterance.onend = () => { isSpeaking = false; if (stopVoiceButton) stopVoiceButton.style.display = 'none'; };
    window.speechSynthesis.speak(utterance);
  }

  function showTemporaryMessage(message) {
    if (!chatBody) return;
    const tempDiv = document.createElement('div');
    tempDiv.className = 'message bot';
    tempDiv.innerHTML = `<div class="message-avatar">&#x1F916;</div><div class="message-content"><p><em>${escapeHtml(message)}</em></p></div>`;
    chatBody.appendChild(tempDiv);
    chatBody.scrollTop = chatBody.scrollHeight;
    setTimeout(() => { tempDiv.remove(); }, 3000);
  }

  function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
  }
  function createVoiceElements() {
    const controlsContainer = document.getElementById('voiceControlsContainer');
    const inputContainer = document.querySelector('.chat-input-container');
    if (!controlsContainer || !inputContainer) return;

    const voiceControls = document.createElement('div');
    voiceControls.className = 'voice-controls';

    voiceButton = document.createElement('button');
    voiceButton.id = 'voiceButton'; voiceButton.className = 'chat-voice-btn';
    voiceButton.title = 'Entrada por voz';
    voiceButton.innerHTML = `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>`;

    stopVoiceButton = document.createElement('button');
    stopVoiceButton.id = 'stopVoiceButton'; stopVoiceButton.className = 'chat-stop-voice-btn';
    stopVoiceButton.title = 'Detener voz'; stopVoiceButton.style.display = 'none';
    stopVoiceButton.innerHTML = `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="6" y="6" width="12" height="12" fill="currentColor"/><circle cx="12" cy="12" r="10" stroke="currentColor" fill="none"/></svg>`;
    stopVoiceButton.addEventListener('click', (e) => { e.preventDefault(); stopSpeaking(); });

    voiceStatus = document.createElement('div');
    voiceStatus.id = 'voiceStatus'; voiceStatus.className = 'chat-voice-status'; voiceStatus.style.display = 'none';
    voiceStatus.innerHTML = `<span class="voice-indicator"></span><span>Escuchando...</span><button class="voice-cancel" id="cancelVoice">&#x2715;</button>`;

    cancelVoice = voiceStatus.querySelector('#cancelVoice');
    if (cancelVoice) { cancelVoice.addEventListener('click', (e) => { e.preventDefault(); stopRecording(); }); }

    voiceControls.appendChild(voiceButton);
    voiceControls.appendChild(stopVoiceButton);
    controlsContainer.appendChild(voiceControls);
    inputContainer.appendChild(voiceStatus);
  }

  function appendBotText(text, isError) {
    if (!chatBody) return;
    const botMsg = document.createElement('div');
    botMsg.className = 'message bot' + (isError ? ' message-error' : '');
    botMsg.innerHTML = `<div class="message-avatar">&#x1F916;</div><div class="message-content"><p>${escapeHtml(text)}</p><span class="message-time">${new Date().toLocaleTimeString('es-PE', { hour: '2-digit', minute: '2-digit' })}</span></div>`;
    chatBody.appendChild(botMsg);
    chatBody.scrollTop = chatBody.scrollHeight;
    if (!isError) speakText(text);
  }

  function enviarMensaje() {
    const mensaje = chatInput.value.trim();
    if (!mensaje) return;
    const userMsg = document.createElement('div');
    userMsg.className = 'message user';
    userMsg.innerHTML = `<div class="message-avatar">&#x1F464;</div><div class="message-content"><p>${escapeHtml(mensaje)}</p><span class="message-time">${new Date().toLocaleTimeString('es-PE', { hour: '2-digit', minute: '2-digit' })}</span></div>`;
    chatBody.appendChild(userMsg);
    chatInput.value = '';
    chatBody.scrollTop = chatBody.scrollHeight;

    const typingDiv = document.createElement('div');
    typingDiv.className = 'message bot'; typingDiv.id = 'typingIndicator';
    typingDiv.innerHTML = `<div class="message-avatar">&#x1F916;</div><div class="message-content"><div class="typing-indicator"><span></span><span></span><span></span></div></div>`;
    chatBody.appendChild(typingDiv);
    chatBody.scrollTop = chatBody.scrollHeight;

    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';
    if (!csrfToken) {
      console.error('CSRF token no encontrado');
      document.getElementById('typingIndicator')?.remove();
      showTemporaryMessage('Recarga la página e intenta de nuevo.');
      return;
    }

    const chatUrl = window.__chatEndpoint || '/chat';

    fetch(chatUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': csrfToken
      },
      credentials: 'same-origin',
      body: JSON.stringify({ message: mensaje })
    })
      .then(async (r) => {
        let data = {};
        try {
          data = await r.json();
        } catch (_) { /* no JSON */ }
        document.getElementById('typingIndicator')?.remove();
        if (!r.ok) {
          const err = data.error || (r.status === 419 ? 'Sesión expirada. Recarga la página.' : 'No se pudo conectar con el asistente.');
          appendBotText(err, true);
          return;
        }
        if (data.reply) {
          appendBotText(data.reply, false);
        } else if (data.error) {
          appendBotText(data.error, true);
        } else {
          appendBotText('Respuesta vacía. Intenta de nuevo.', true);
        }
      })
      .catch((e) => {
        console.error('Error:', e);
        document.getElementById('typingIndicator')?.remove();
        appendBotText('Error de red. Comprueba tu conexión e intenta otra vez.', true);
      });
  }

  function init() {
    initVoiceAPI();
    createVoiceElements();
    chatButton.onclick = (e) => {
      e.preventDefault(); isOpen = !isOpen; chatWindow.classList.toggle('open');
      if (isOpen && chatInput) { chatInput.focus(); if (chatBody.children.length === 0) { /* Welcome message */ } }
      else if (!isOpen) stopSpeaking();
    };
    if (chatClose) chatClose.onclick = (e) => { e.preventDefault(); isOpen = false; chatWindow.classList.remove('open'); stopSpeaking(); };
    if (chatSend && chatInput) {
      chatSend.onclick = enviarMensaje;
      chatInput.onkeypress = (e) => { if (e.key === 'Enter') { e.preventDefault(); enviarMensaje(); } };
    }
    if (voiceButton) voiceButton.addEventListener('click', (e) => { e.preventDefault(); if (isRecording) stopRecording(); else startRecording(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && isOpen) { isOpen = false; chatWindow.classList.remove('open'); if (isRecording) stopRecording(); stopSpeaking(); } });
  }

  init();
});
