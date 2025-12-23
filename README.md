# ⚠ NOTA IMPORTANTE PARA DESARROLLADORES

Este proyecto utiliza **Tailwind CSS** con compilación local.

### 🛑 ANTES DE EDITAR ESTILOS
Si vas a agregar clases de diseño nuevas (ej. cambiar colores, tamaños, márgenes) que no se hayan usado antes en el proyecto, **NO LO HAGAS DIRECTAMENTE EN PRODUCCIÓN**.

El archivo CSS (`dist/output.css`) es estático. Si agregas una clase nueva en el HTML sin recompilar, **no se verá el cambio**.

---

### ✅ FLUJO DE TRABAJO CORRECTO

1.  **Trabaja en Local**: Realiza los cambios de diseño en tu entorno de desarrollo.
2.  **Compila**: Ejecuta el siguiente comando para regenerar el CSS:
    ```bash
    npm run build
    ```
    *(Esto actualizará `dist/output.css` con tus nuevas clases).*
3.  **Sube los Cambios**:
    ```bash
    git add .
    git commit -m "Cambios de diseño"
    git push
    ```
4.  **Actualiza el Servidor**:
    ```bash
    git pull
    ```

---

### 📝 CAMBIOS QUE NO REQUIEREN BUILD
Puedes editar directamente en el servidor si SOLO modificas:
*   Texto o contenido HTML.
*   Lógica PHP.
*   Clases de Tailwind que **YA** existan visualmente en otra parte del sitio.

> **Contacto**: Si tienes dudas sobre el entorno de Node.js o Tailwind, contacta al administrador del proyecto antes de modificar archivos CSS manualmente.
