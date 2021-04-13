<?php

use App\Repositories\Branch\Branch;
use App\Repositories\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['email' => 'colon@pardohogar.com.ar', 'name' => 'Sucursal Colon', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'rojas@pardohogar.com.ar', 'name' => 'Sucursal Rojas', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'pergamino@pardohogar.com.ar', 'name' => 'Sucursal Pergamino', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'sanpedro@pardohogar.com.ar', 'name' => 'Sucursal San Pedro', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'baradero@pardohogar.com.ar', 'name' => 'Sucursal Baradero', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'firmat@pardohogar.com.ar', 'name' => 'Sucursal Firmat', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'salto@pardohogar.com.ar', 'name' => 'Sucursal Salto', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'venadotuerto@pardohogar.com.ar', 'name' => 'Sucursal Venado Tuerto', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'bragado@pardohogar.com.ar', 'name' => 'Sucursal Bragado', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'arrecifes@pardohogar.com.ar', 'name' => 'Sucursal Arrecifes', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'sannicolas@pardohogar.com.ar', 'name' => 'Sucursal San Nicolas', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'villaconstitucion@pardohogar.com.ar', 'name' => 'Sucursal Villa Constitucion', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'canada@pardohogar.com.ar', 'name' => 'Sucursal Cañada de Gomez', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'sanantonio@pardohogar.com.ar', 'name' => 'Sucursal San Antonio de Areco', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'tlauquen@pardohogar.com.ar', 'name' => 'Sucursal Trenque Lauquen', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'pehuajo@pardohogar.com.ar', 'name' => 'Sucursal Pehuajo', 'password' => Hash::make('p4Rd02020')],
            ['email' => '9dejulio@pardohogar.com.ar', 'name' => 'Sucursal 9 de Julio', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'bolivar@pardohogar.com.ar', 'name' => 'Sucursal Bolivar', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'chacabuco@pardohogar.com.ar', 'name' => 'Sucursal Chacabuco', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'chivilcoy@pardohogar.com.ar', 'name' => 'Sucursal Chivilcoy', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'olavarria@pardohogar.com.ar', 'name' => 'Sucursal Olavarria', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'rivadavia@pardohogar.com.ar', 'name' => 'Sucursal Rivadavia', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'laboulaye@pardohogar.com.ar', 'name' => 'Sucursal Laboulaye', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'CarmenAreco@pardohogar.com.ar', 'name' => 'Sucursal Carmen de Areco', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'rufino@pardohogar.com.ar', 'name' => 'Sucursal Rufino', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'villegas@pardohogar.com.ar', 'name' => 'Sucursal Villegas', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'villamaria@pardohogar.com.ar', 'name' => 'Sucursal Villa Maria - Terminal', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'capitansarmiento@pardohogar.com.ar', 'name' => 'Sucursal Capitan Sarmiento', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'bellville@pardohogar.com.ar', 'name' => 'Sucursal Bellville', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'mercedes@pardohogar.com.ar', 'name' => 'Sucursal Mercedes', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'Victoria@pardohogar.com.ar', 'name' => 'Sucursal Victoria', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'concepcion@pardohogar.com.ar', 'name' => 'Sucursal Concepcion del Urugua', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'marcosjuarez@pardohogar.com.ar', 'name' => 'Sucursal Marcos Juarez', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'azul@pardohogar.com.ar', 'name' => 'Sucursal Azul', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'sanjorge@pardohogar.com.ar', 'name' => 'Sucursal San Jorge', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'zarate@pardohogar.com.ar', 'name' => 'Sucursal Zarate', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'gualeguay@pardohogar.com.ar', 'name' => 'Sucursal Gualeguay', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'campana@pardohogar.com.ar', 'name' => 'Sucursal Campana', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'pilar@pardohogar.com.ar', 'name' => 'Sucursal Pilar', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'giles@pardohogar.com.ar', 'name' => 'Sucursal San Andrés de Giles', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'casilda@pardohogar.com.ar', 'name' => 'Sucursal Casilda', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'lasvarillas@pardohogar.com.ar', 'name' => 'Sucursal Las Varillas', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'nogoya@pardohogar.com.ar', 'name' => 'Sucursal Nogoya', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'ramirez@pardohogar.com.ar', 'name' => 'Sucursal Ramirez', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'viale@pardohogar.com.ar', 'name' => 'Sucursal Viale', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'deheza@pardohogar.com.ar', 'name' => 'Sucursal Deheza', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'canuelas@pardohogar.com.ar', 'name' => 'Sucursal Cañuelas', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'lacarlota@pardohogar.com.ar', 'name' => 'Sucursal La Carlota', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'ramallo@pardohogar.com.ar', 'name' => 'Sucursal Ramallo', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'Pardoservice@pardohogar.com.ar', 'name' => 'Pardo Service', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'deposito@pardohogar.com.ar', 'name' => 'Depósito Central', 'password' => Hash::make('p4Rd02020')],
            ['email' => 'villamaria2@pardohogar.com.ar', 'name' => 'Sucursal Villa Maria - Centro', 'password' => Hash::make('p4Rd02020')]
        ];
        foreach ($users as $user) {
            $branch = User::create(['email' => $user['email'], 'name' => $user['name'], 'password' => $user['password']]);
            Branch::create(['user_id' => $branch->id, 'city' => $branch->name]);
        }
    }
}
