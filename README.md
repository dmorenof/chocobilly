# Chocobilly

## Instalación

1. Asegúrate de que tienes instalados en tu entorno:
    - php >= 8
    - composer

2. Clona este repositorio en tu máquina local:

   ```bash
   git clone https://github.com/dmorenof/chocobilly.git
   cd chocobilly
   ```

3. Instala composer para activar autoload:

   ```bash
   composer install
   ```

## Uso

Ejecuta Chocobilly con el siguiente comando:

```bash
  chocobilly <path-to-input.txt>
```

### Ejemplo de uso básico

Ejemplo de un archivo input:
```txt
2
2, 3
6
1, 2
5
```
Ejecuta:
```bash
  chocobilly <path-to-input.txt>
```
Ejemplo de un resultado:

```txt
2:3,3
3:2,2,1
```