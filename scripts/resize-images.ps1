<#
.SYNOPSIS
    Redimensiona imágenes fit-cover a los tamaños del proyecto.

.DESCRIPTION
    Lee un manifest (csv-like: src|dest|width|height|quality) y genera JPGs
    optimizados con System.Drawing, usando crop centrado y bicúbica.

.EXAMPLE
    powershell -NoProfile -ExecutionPolicy Bypass -File .\resize-images.ps1 .\image-manifest.txt
#>

param(
    [Parameter(Mandatory = $true, Position = 0)]
    [string]$ManifestPath
)

Add-Type -AssemblyName System.Drawing

function Resize-One {
    param(
        [string]$Src,
        [string]$Dest,
        [int]$W,
        [int]$H,
        [int]$Q = 82
    )

    if (-not (Test-Path -LiteralPath $Src)) {
        Write-Host "SKIP (no existe): $Src" -ForegroundColor Yellow
        return
    }

    $img = [System.Drawing.Image]::FromFile((Resolve-Path -LiteralPath $Src))
    try {
        $srcRatio = $img.Width / $img.Height
        $tgtRatio = $W / $H

        if ($srcRatio -gt $tgtRatio) {
            $cropH = $img.Height
            $cropW = [int]([math]::Round($img.Height * $tgtRatio))
            $x = [int]([math]::Round(($img.Width - $cropW) / 2))
            $y = 0
        } else {
            $cropW = $img.Width
            $cropH = [int]([math]::Round($img.Width / $tgtRatio))
            $x = 0
            $y = [int]([math]::Round(($img.Height - $cropH) / 2))
        }

        $bmp = New-Object System.Drawing.Bitmap $W, $H
        $g = [System.Drawing.Graphics]::FromImage($bmp)
        $g.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
        $g.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
        $g.PixelOffsetMode = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
        $g.CompositingQuality = [System.Drawing.Drawing2D.CompositingQuality]::HighQuality

        $destRect = New-Object System.Drawing.Rectangle 0, 0, $W, $H
        $g.DrawImage($img, $destRect, $x, $y, $cropW, $cropH, [System.Drawing.GraphicsUnit]::Pixel)

        $destDir = Split-Path -Parent $Dest
        if (-not (Test-Path -LiteralPath $destDir)) {
            New-Item -ItemType Directory -Path $destDir -Force | Out-Null
        }

        $codec = [System.Drawing.Imaging.ImageCodecInfo]::GetImageEncoders() | Where-Object { $_.MimeType -eq 'image/jpeg' }
        $params = New-Object System.Drawing.Imaging.EncoderParameters 1
        $params.Param[0] = New-Object System.Drawing.Imaging.EncoderParameter ([System.Drawing.Imaging.Encoder]::Quality, [long]$Q)

        $bmp.Save($Dest, $codec, $params)

        $g.Dispose()
        $bmp.Dispose()

        $kb = [math]::Round((Get-Item -LiteralPath $Dest).Length / 1KB)
        Write-Host "OK  $Dest  (${W}x${H}, ${kb} KB)" -ForegroundColor Green
    } finally {
        $img.Dispose()
    }
}

if (-not (Test-Path -LiteralPath $ManifestPath)) {
    Write-Error "Manifest no encontrado: $ManifestPath"
    exit 1
}

$lines = Get-Content -LiteralPath $ManifestPath -Encoding UTF8
$total = 0
$ok = 0
foreach ($line in $lines) {
    $trim = $line.Trim()
    if (-not $trim -or $trim.StartsWith('#')) { continue }
    $parts = $trim.Split('|')
    if ($parts.Count -lt 4) { continue }
    $total++
    $q = if ($parts.Count -ge 5 -and $parts[4]) { [int]$parts[4] } else { 82 }
    try {
        Resize-One -Src $parts[0] -Dest $parts[1] -W ([int]$parts[2]) -H ([int]$parts[3]) -Q $q
        $ok++
    } catch {
        Write-Host "ERR $($parts[1]): $($_.Exception.Message)" -ForegroundColor Red
    }
}
Write-Host "`nTotal: $ok / $total" -ForegroundColor Cyan
