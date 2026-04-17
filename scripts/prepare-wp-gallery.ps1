# prepare-wp-gallery.ps1
# Convierte todas las imagenes de gallery/ a JPG 1200x900 fit-cover
# y las guarda en assets/images/wp-gallery-ready/{categoria}/01.jpg, 02.jpg...

Add-Type -AssemblyName System.Drawing

$root     = Split-Path $PSScriptRoot -Parent
$srcBase  = "$root\carpintero-theme\assets\images\gallery"
$destBase = "$root\carpintero-theme\assets\images\wp-gallery-ready"
$W = 1200; $H = 900; $Q = 85

$categories = @('cocinas','armarios','banos','mantenimiento','hero')

$jpegEncoder = [System.Drawing.Imaging.ImageCodecInfo]::GetImageEncoders() |
    Where-Object { $_.MimeType -eq 'image/jpeg' } | Select-Object -First 1
$encParams = New-Object System.Drawing.Imaging.EncoderParameters(1)
$encParams.Param[0] = New-Object System.Drawing.Imaging.EncoderParameter(
    [System.Drawing.Imaging.Encoder]::Quality, [long]$Q)

foreach ($cat in $categories) {
    $srcDir  = "$srcBase\$cat"
    $destDir = "$destBase\$cat"
    New-Item -ItemType Directory -Force -Path $destDir | Out-Null

    $files = Get-ChildItem -Path $srcDir -File |
        Where-Object { $_.Extension -match '\.(jpg|jpeg|png|JPG|JPEG|PNG)$' } |
        Sort-Object Name

    $i = 1
    foreach ($file in $files) {
        $destFile = "$destDir\{0:D2}.jpg" -f $i
        try {
            $src = [System.Drawing.Image]::FromFile($file.FullName)
            $srcW = $src.Width; $srcH = $src.Height

            # fit-cover: calcular recorte centrado
            $srcRatio  = $srcW / $srcH
            $destRatio = $W / $H
            if ($srcRatio -gt $destRatio) {
                $cropH = $srcH
                $cropW = [int]($srcH * $destRatio)
                $cropX = [int](($srcW - $cropW) / 2)
                $cropY = 0
            } else {
                $cropW = $srcW
                $cropH = [int]($srcW / $destRatio)
                $cropX = 0
                $cropY = [int](($srcH - $cropH) / 2)
            }

            $bmp = New-Object System.Drawing.Bitmap($W, $H)
            $g   = [System.Drawing.Graphics]::FromImage($bmp)
            $g.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
            $g.PixelOffsetMode   = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
            $g.DrawImage($src,
                [System.Drawing.Rectangle]::new(0, 0, $W, $H),
                [System.Drawing.Rectangle]::new($cropX, $cropY, $cropW, $cropH),
                [System.Drawing.GraphicsUnit]::Pixel)
            $bmp.Save($destFile, $jpegEncoder, $encParams)
            $g.Dispose(); $bmp.Dispose(); $src.Dispose()

            Write-Host "OK  $cat/$("{0:D2}" -f $i).jpg  ← $($file.Name)"
            $i++
        } catch {
            Write-Host "ERR $($file.Name): $_"
        }
    }
    $count = $i - 1
    Write-Host "--- ${cat}: $count imagenes procesadas ---"
}

Write-Host "`nTotal completado. Imágenes en: $destBase"
