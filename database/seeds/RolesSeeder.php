<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resetea el cache el los roles y permisos
        app()['cache']->forget('spatie.permission.cache');


        /// crea los permisos para el crud del roles
        ///
        Permission::create(['name' => 'create_role', 'modulo' => 'Roles', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_role',  'modulo' => 'Roles', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_role',  'modulo' => 'Roles', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_role',  'modulo' => 'Roles', 'alias' => 'Eliminar']);

        /// crea los permisos para el crud del usuario
        ///
        Permission::create(['name' => 'create_user', 'modulo' => 'Usuarios', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_user', 'modulo' => 'Usuarios', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_user', 'modulo' => 'Usuarios', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_user', 'modulo' => 'Usuarios', 'alias' => 'Eliminar']);

        /// crea los permisos para el crud del techier

        Permission::create(['name' => 'create_animal', 'modulo' => 'Ganado', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_animal', 'modulo' => 'Ganado', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_animal', 'modulo' => 'Ganado', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_animal', 'modulo' => 'Ganado', 'alias' => 'Eliminar']);

        /// crea los permisos para el crud de los students

        Permission::create(['name' => 'create_employe', 'modulo' => 'Empleados', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_employe', 'modulo' => 'Empleados', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_employe', 'modulo' => 'Empleados', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_employe', 'modulo' => 'Empleados', 'alias' => 'Eliminar']);

        /// crea los permisos para el crud de los levels
        Permission::create(['name' => 'create_estate', 'modulo' => 'Hacienda', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_estate', 'modulo' => 'Hacienda', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_estate', 'modulo' => 'Hacienda', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_estate', 'modulo' => 'Hacienda', 'alias' => 'Eliminar ']);

        //permisos para el crud de los courses
        Permission::create(['name' => 'create_income', 'modulo' => 'Ingresos', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_income', 'modulo' => 'Ingresos', 'alias' => 'Leer Cursos']);
        Permission::create(['name' => 'update_income', 'modulo' => 'Ingresos', 'alias' => 'Modificar ']);
        Permission::create(['name' => 'destroy_income', 'modulo' => 'Ingresos', 'alias' => 'Eliminar ']);

                //permisos para el crud de los subjects
        Permission::create(['name' => 'create_delivery', 'modulo' => 'Entregas', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_delivery', 'modulo' => 'Entregas', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_delivery', 'modulo' => 'Entregas', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_delivery', 'modulo' => 'Entregas', 'alias' => 'Eliminar']);
    
          //permisos para el crud de los tasks
        Permission::create(['name' => 'create_disease', 'modulo' => 'Enfermedades', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_disease', 'modulo' => 'Enfermedades', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_disease', 'modulo' => 'Enfermedades', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_disease', 'modulo' => 'Enfermedades', 'alias' => 'Eliminar']);

            //permisos para el crud de los academic period
        Permission::create(['name' => 'create_ac_births', 'modulo' => 'Partos', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_ac_births', 'modulo' => 'Partos', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_ac_births', 'modulo' => 'Partos', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_ac_births', 'modulo' => 'Partos', 'alias' => 'Eliminar']);

        //permisos para el crud de los files
        Permission::create(['name' => 'create_treatment', 'modulo' => 'Tratamientos', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_treatment', 'modulo' => 'Tratamientos', 'alias' => 'Leer ']);
        Permission::create(['name' => 'update_treatment', 'modulo' => 'Tratamientos', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_treatment', 'modulo' => 'Tratamientos', 'alias' => 'Eliminar']);

        //permisos para el crud de los files
        Permission::create(['name' => 'create_milking', 'modulo' => 'Ordeños', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_milking', 'modulo' => 'Ordeños', 'alias' => 'Leer ']);
        Permission::create(['name' => 'update_milking', 'modulo' => 'Ordeños', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_milking', 'modulo' => 'Ordeños', 'alias' => 'Eliminar']);

        //permisos para el crud de los files
        Permission::create(['name' => 'create_sales', 'modulo' => 'Ventas', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_sales', 'modulo' => 'Ventas', 'alias' => 'Leer ']);
        Permission::create(['name' => 'update_sales', 'modulo' => 'Ventas', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_sales', 'modulo' => 'Ventas', 'alias' => 'Eliminar']);

           //permisos para el crud de los files
         Permission::create(['name' => 'create_purcharse', 'modulo' => 'Compras', 'alias' => 'Crear']);
         Permission::create(['name' => 'read_purcharse', 'modulo' => 'Compras', 'alias' => 'Leer ']);
         Permission::create(['name' => 'update_purcharse', 'modulo' => 'Compras', 'alias' => 'Modificar']);
         Permission::create(['name' => 'destroy_purcharse', 'modulo' => 'Compras', 'alias' => 'Eliminar']);
 


        /// cramos los roles para que son admin, propietario, secretaria, medico
        $role = Role::create(['name' => 'Administrador', 'description'=>'Rol de administrador','status' => true]);

        //asignacion de los permisos al rol admin
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'Empleado','description'=>'Rol de Empleado', 'status' => true]);
        $role = Role::create(['name' => 'Mayordomo','description'=>'Rol de mayordomo', 'status' => true]);

        ///crearmos el usario por defecto
        $user_password = Hash::make('root1234');
        $user = User::create([
               
                'name' => 'Ivan',
                'last_name' => 'admin',
                'url_image' => 'img/user.jpg',
                'phone' => '0986787778',
                'email' => 'admin@gmail.com',
                'address' => 'S/N',
                'status' => 1,
                'password' => $user_password,
            ]
        );
        $user->assignRole('Administrador');
    }
}
