<?php

use App\Models\Calon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach(DB::table('calons')->oldest('id')->cursor() as $calons){
            DB::table('rich_texts')->insert([
                'field' => 'visi_misi',
                'body' => '<div>' . $calons->visi_misi . '</div>',
                'record_type' => (new Calon())->getMorphClass(),
                'record_id' => $calons->id,
                'created_at' => $calons->created_at,
                'updated_at' => $calons->updated_at
            ]);
        }
        Schema::table('calons', function(Blueprint $table){
            $table->dropColumn('visi_misi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rich_texts', function (Blueprint $table) {
            //
        });
    }
};
