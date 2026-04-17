$base  = "C:\Users\Kardos\Desktop\Trabajo\Paginas web\proyectoPruebaClaude\carpintero-theme\assets\images"
$out   = "C:\Users\Kardos\Desktop\Trabajo\Paginas web\proyectoPruebaClaude\scripts\image-manifest-slider.txt"

$cats = @{
    "cocinas"       = 10
    "armarios"      = 10
    "banos"         = 10
    "mantenimiento" = 7
}

$lines = New-Object System.Collections.Generic.List[string]
$lines.Add("# Manifest slider 16x9")

foreach ($cat in $cats.GetEnumerator()) {
    $srcDir  = "$base\gallery\$($cat.Key)"
    $destDir = "$base\optimized\$($cat.Key)"
    $files   = Get-ChildItem $srcDir -File |
               Where-Object { $_.Extension -match '\.(jpg|jpeg|png)$' } |
               Sort-Object Name |
               Select-Object -First $cat.Value

    if ($files.Count -eq 0) {
        Write-Warning "Sin archivos en $srcDir"
        continue
    }

    $lines.Add("")
    $lines.Add("# " + $cat.Key)
    for ($i = 0; $i -lt $files.Count; $i++) {
        $num  = "{0:D2}" -f ($i + 1)
        $src  = $files[$i].FullName
        $dest = $destDir + "\" + $num + ".jpg"
        $line = $src + "|" + $dest + "|1200|675|84"
        $lines.Add($line)
    }
}

[System.IO.File]::WriteAllLines($out, $lines, [System.Text.UTF8Encoding]::new($false))
Write-Host ("Manifest generado: " + $out)
Get-Content $out
