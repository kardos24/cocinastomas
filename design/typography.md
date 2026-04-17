# Tipografía — Combo 1 (elegante artesanal)

- **Títulos:** Playfair Display (500, 600, 700)
- **Cuerpo:** Inter (400, 500, 600, 700)

Se cargan desde Google Fonts con `display=swap` para no bloquear render.

## Escala tipográfica

| Token     | Tamaño     | Uso                                         |
|-----------|------------|---------------------------------------------|
| `--fs-sm` | 0.875rem   | Eyebrows, metadatos, formularios            |
| `--fs-base` | 1rem     | Texto de lectura                            |
| `--fs-lg` | 1.125rem   | Lead, destacados                            |
| `--fs-xl` | 1.25rem    | h3                                          |
| `--fs-2xl`| 1.5rem     | Subtítulos                                  |
| `--fs-3xl`| 2rem       | h2                                          |
| `--fs-4xl`| 2.75rem    | h1                                          |
| `--fs-5xl`| 3.5rem     | Hero title (clamp responsive)               |

## Reglas

- h1–h4 en Playfair 500/600.
- Cuerpo en Inter 400, interlineado 1.6.
- Eyebrows en Inter 600, MAYÚSCULAS, `letter-spacing: 0.12em`.
- Nunca mezclar más de dos pesos por bloque.

## Ejemplo

```
EYEBROW (Inter 600 uppercase)
Título en Playfair Display
Texto en Inter 400, línea de 60–75 caracteres.
```
