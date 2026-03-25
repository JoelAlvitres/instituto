<?php

namespace App\Support;

/**
 * Resuelve URLs de medios subidos: nuevos en public/images (sin storage:link)
 * y legado en storage/app/public vía /storage/...
 */
class MediaUrl
{
    protected static function isAbsoluteUrl(?string $path): bool
    {
        return $path && (str_starts_with($path, 'http://') || str_starts_with($path, 'https://'));
    }

    public static function docenteFoto(?string $path): ?string
    {
        if (! $path) {
            return null;
        }
        if (self::isAbsoluteUrl($path)) {
            return $path;
        }

        return str_starts_with($path, 'docentes/')
            ? asset('storage/'.$path)
            : asset('images/docentes/'.$path);
    }

    public static function docenteCv(?string $path): ?string
    {
        if (! $path) {
            return null;
        }
        if (self::isAbsoluteUrl($path)) {
            return $path;
        }

        return str_starts_with($path, 'docentes/')
            ? asset('storage/'.$path)
            : asset('images/docentes/cvs/'.$path);
    }

    public static function paginaBanner(?string $path): ?string
    {
        if (! $path) {
            return null;
        }
        if (self::isAbsoluteUrl($path)) {
            return $path;
        }

        return str_starts_with($path, 'paginas/')
            ? asset('storage/'.$path)
            : asset('images/paginas/banners/'.$path);
    }

    public static function autoridadFoto(?string $path): ?string
    {
        if (! $path) {
            return null;
        }
        if (self::isAbsoluteUrl($path)) {
            return $path;
        }

        return str_starts_with($path, 'autoridades/')
            ? asset('storage/'.$path)
            : asset('images/autoridades/'.$path);
    }

    public static function organigramaImagen(?string $path): ?string
    {
        if (! $path) {
            return null;
        }
        if (self::isAbsoluteUrl($path)) {
            return $path;
        }

        return str_starts_with($path, 'paginas/')
            ? asset('storage/'.$path)
            : asset('images/organigrama/'.$path);
    }

    public static function organigramaPdf(?string $path): ?string
    {
        if (! $path) {
            return null;
        }
        if (self::isAbsoluteUrl($path)) {
            return $path;
        }

        return str_starts_with($path, 'paginas/')
            ? asset('storage/'.$path)
            : asset('images/organigrama/'.$path);
    }
}
