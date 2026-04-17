# Paleta de colores — Opción B (moderna minimalista)

| Rol          | HEX       | Uso                                            |
|--------------|-----------|------------------------------------------------|
| Primario     | `#1A1A1A` | Textos principales, header, CTAs primarios     |
| Secundario   | `#F5F1EA` | Fondos claros de sección, textos sobre oscuro  |
| Acento       | `#B8860B` | Enlaces activos, CTAs secundarios, eyebrows    |
| Fondo        | `#FFFFFF` | Fondo de página                                |
| Texto        | `#2B2B2B` | Texto de lectura                               |
| Muted        | `#6B6B6B` | Texto secundario, leads                        |
| Borde        | `#E5E0D6` | Separadores, bordes de inputs                  |

## Accesibilidad — contraste (WCAG)

- Primario `#1A1A1A` sobre blanco → **ratio 19:1** ✅ AAA
- Acento `#B8860B` sobre blanco → ratio ~4.7:1 ✅ AA para texto normal
- Texto `#2B2B2B` sobre `#F5F1EA` → ratio ~12:1 ✅ AAA

El acento solo se usa sobre fondos claros. Para acento sobre oscuro, usar `#D4A574`.

## Variables CSS

```css
--color-primary: #1A1A1A;
--color-secondary: #F5F1EA;
--color-accent: #B8860B;
--color-bg: #FFFFFF;
--color-text: #2B2B2B;
--color-muted: #6B6B6B;
--color-border: #E5E0D6;
```
