<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablasAdquisiciones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reqs', function($table)
		{
			$table->increments('id');
			$table->integer('req')->unsigned()->unique();
			$table->date('fecha_req');
			$table->integer('urg_id')->unsigned();
			$table->foreign('urg_id')->references('id')->on('urgs');
			$table->integer('proyecto_id')->unsigned();
			$table->foreign('proyecto_id')->references('id')->on('proyectos');
			$table->string('etiqueta', 100);
			$table->string('lugar_entrega');
			$table->text('obs');
			$table->smallInteger('solicita')->unsigned();
			$table->smallInteger('autoriza')->unsigned();
			$table->smallInteger('vobo')->unsigned();
			$table->string('estatus', 20);
			$table->smallInteger('responsable')->unsigned();
			$table->date('fecha_auth');
			$table->string('tipo_orden', 20);
			$table->timestamps();
			$table->softDeletes();
		});
		
		Schema::create('articulos', function($table)
		{
			$table->increments('id');
			$table->integer('req_id')->unsigned();
			$table->foreign('req_id')->references('id')->on('reqs');
			$table->text('articulo');
			$table->double('cantidad', 12, 5);
			$table->double('costo', 12, 5);
			$table->tinyInteger('impuesto');
			$table->decimal('monto', 15, 3);
			$table->integer('oc')->unsigned();
			$table->string('unidad', 20);
			$table->boolean('inventariable');
			$table->integer('rm_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
		
		Schema::create('cotizaciones', function($table)
		{
			$table->increments('id');
			$table->integer('req_id')->unsigned();
			$table->foreign('req_id')->references('id')->on('reqs');
			$table->integer('benef_id')->unsigned();
			$table->foreign('benef_id')->references('id')->on('benefs');
			$table->date('fecha_invitacion');
			$table->date('fecha_cotiza');
			$table->string('vigencia', 30);
			$table->string('garantia', 30);
			$table->timestamps();
			$table->softDeletes();
		});
		
		Schema::create('articulo_cotizacion', function($table)
		{
			$table->increments('id');
			$table->integer('req_id')->unsigned();
			$table->foreign('req_id')->references('id')->on('reqs');
			$table->integer('articulo_id')->unsigned();
			$table->foreign('articulo_id')->references('id')->on('articulos');
			$table->double('costo', 12, 3);
			$table->boolean('sel');
			$table->timestamps();
			$table->softDeletes();
		});
		
		Schema::create('cuadros', function($table)
		{
			$table->increments('id');
			$table->integer('req_id')->unsigned();
			$table->foreign('req_id')->references('id')->on('reqs');
			$table->date('fecha_cuadro');
			$table->string('estatus', 20);
			$table->smallInteger('elabora')->unsigned();
			$table->smallInteger('revisa')->unsigned();
			$table->smallInteger('autoriza')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
		
		Schema::create('cotizacion_cuadro', function($table)
		{
			$table->increments('id');
			$table->integer('cuadro_id')->unsigned();
			$table->integer('cotizacion_id')->unsigned();
			$table->string('criterio');
		});
		
		Schema::create('ocs', function($table)
		{
			$table->increments('id');
			$table->integer('req_id')->unsigned();
			$table->foreign('req_id')->references('id')->on('reqs');
			$table->integer('oc')->unsigned()->unique();
			$table->date('fecha_oc');
			$table->integer('benef_id')->unsigned();
			$table->foreign('benef_id')->references('id')->on('benefs');
			$table->string('estatus', 20);
			$table->timestamps();
			$table->softDeletes();
		});
		
		Schema::create('ocs_condiciones', function($table)
		{
			$table->increments('id');
			$table->integer('oc_id')->unsigned();
			$table->foreign('oc_id')->references('id')->on('ocs');
			$table->string('forma_pago', 20);
			$table->string('fecha_entrega', 20);
			$table->string('pago', 50);
			$table->tinyInteger('no_parcialidades');
			$table->tinyInteger('porcentaje_anticipo');
			$table->string('fecha_inicio', 20);
			$table->string('fecha_conclusion', 20);
			$table->string('fianzas', 12);
			$table->string('obs');
		});
		
		Schema::create('egreso_oc', function($table)
		{
			$table->increments('id');
			$table->integer('oc_id')->unsigned();
			$table->integer('egreso_id')->unsigned();
		});
		
		Schema::create('unidades', function($table)
		{
			$table->increments('id');
			$table->string('unidad', 50);
			$table->string('tipo', 30);
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('unidades');
		Schema::drop('egreso_oc');
		Schema::drop('ocs_condiciones');
		Schema::drop('ocs');
		Schema::drop('cotizacion_cuadro');
		Schema::drop('cuadros');
		Schema::drop('articulo_cotizacion');
		Schema::drop('cotizaciones');
		Schema::drop('articulos');
		Schema::drop('reqs');
	}

}
