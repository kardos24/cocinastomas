Add-Type -AssemblyName System.Drawing

$base = "C:\Users\Kardos\Desktop\Trabajo\Paginas web\proyectoPruebaClaude\carpintero-theme\assets\images"
$src  = "$base\logo\logo-isotipo.png"

$dirFavicon = "$base\favicon"
$dirLogo    = "$base\logo"
$dirOpt     = "$base\optimized\favicon"

foreach ($d in @($dirFavicon, $dirOpt)) {
    if (-not (Test-Path $d)) { New-Item -ItemType Directory -Path $d | Out-Null }
}

function Save-Favicon($outPath, $w, $h) {
    $orig = [System.Drawing.Image]::FromFile($src)
    $bmp  = New-Object System.Drawing.Bitmap($w, $h)
    $g    = [System.Drawing.Graphics]::FromImage($bmp)
    $g.InterpolationMode  = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
    $g.SmoothingMode      = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
    $g.PixelOffsetMode    = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
    $g.CompositingQuality = [System.Drawing.Drawing2D.CompositingQuality]::HighQuality
    $g.Clear([System.Drawing.Color]::Transparent)
    $g.DrawImage($orig, 0, 0, $w, $h)
    $g.Dispose()
    $orig.Dispose()
    $bmp.Save($outPath, [System.Drawing.Imaging.ImageFormat]::Png)
    $bmp.Dispose()
    Write-Host "OK $w x $h -> $outPath"
}

# /favicon/
Save-Favicon "$dirFavicon\favicon-16x16.png"          16  16
Save-Favicon "$dirFavicon\favicon-32x32.png"          32  32
Save-Favicon "$dirFavicon\favicon-48x48.png"          48  48
Save-Favicon "$dirFavicon\apple-touch-icon.png"      180 180
Save-Favicon "$dirFavicon\android-chrome-192x192.png" 192 192
Save-Favicon "$dirFavicon\android-chrome-512x512.png" 512 512

# /logo/ (copias útiles para referencias en tema WP)
Save-Favicon "$dirLogo\favicon-32x32.png"             32  32
Save-Favicon "$dirLogo\apple-touch-icon.png"         180 180

# /optimized/favicon/ (versiones web-ready)
Save-Favicon "$dirOpt\favicon-192.png"               192 192
Save-Favicon "$dirOpt\favicon-512.png"               512 512

# Copiar ICO existente
$icoSrc = "$dirLogo\logo-horizontal.ico"
if (Test-Path $icoSrc) {
    Copy-Item $icoSrc "$dirFavicon\favicon.ico" -Force
    Write-Host "OK ICO -> $dirFavicon\favicon.ico"
}

Write-Host "`nFavicons generados correctamente."
