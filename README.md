# Examen Parcial I - Sistema de Notas Colaborativas
**Estudiante:** Remmy Moreira  
**Materia:** INF560 - Desarrollo Web Backend 

## Requisitos
* PHP 8.3+ 
* PostgreSQL
* Composer

## Pasos para ejecutar el proyecto desde cero
1. **Clonar el repositorio.**
2. **Configurar el entorno:**
   - Crear una base de datos en PostgreSQL llamada `db_notas_examen`.
   - Copiar el archivo `.env.example` a `.env` y configurar las credenciales de la BD.
3. **Instalar dependencias:**
   ```bash
   composer install




Generar llave y preparar base de datos:
php artisan key:generate


Ejecutar Migraciones y Seeders:
php artisan migrate:fresh --seed

Bitácora de pruebas:
Los comandos ejecutados para el examen se encuentran en el archivo examen-tinker.md.


4.  Baja hasta el final de la página y haz clic en el botón verde que dice **"Commit changes"**.

### Un último detalle importante:
En tu archivo **`examen-tinker.md`**, asegúrate de haber incluido la última parte que suele pedir el examen: **La eliminación en cascada (P13)**. 

Si no la has puesto, puedes probar esto en tu terminal (`php artisan tinker`) y añadirlo al archivo:

```php
// P13: Verificación de eliminación en cascada
// Al eliminar una categoría, sus notas deberían desaparecer (si configuraste onDelete('cascade'))
$cat = App\Models\Category::first();
$cat->delete();

// Verificamos si quedan notas huérfanas (debería dar 0 o menos que antes)
App\Models\Note::where('category_id', $cat->id)->count();
