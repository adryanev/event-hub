<?php

use yii\db\Migration;

/**
 * Class m190414_101533_init_db_table
 */
class m190414_101533_init_db_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%akun}}', [
            'id' => $this->bigPrimaryKey(),
            'username' => $this->string()->unique()->notNull(),
            'auth_key' => $this->string(32),
            'password_hash' => $this->string(64),
            'password_reset_token' => $this->string(),
            'access_token' => $this->string(),
            'email' => $this->string()->unique()->notNull(),
            'is_participant' => $this->boolean(),
            'is_organizer' => $this->boolean(),
            'is_admin' => $this->boolean(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%admin}}', [
            'id' => $this->bigPrimaryKey(),
            'id_akun' => $this->bigInteger(),
            'nama_depan' => $this->string(),
            'nama_belakang' => $this->string(),
            'nomor_telepon' => $this->string(16),
            'tanggal_lahir' => $this->date(),
            'jenis_kelamin' => $this->string(1),
            'avatar' => $this->string()->defaultValue('avatar.jpg'),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'slug' => $this->string(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%organizer}}', [
            'id' => $this->bigPrimaryKey(),
            'id_akun' => $this->bigInteger(),
            'nama' => $this->string(),
            'organisasi' => $this->string(),
            'alamat_1' => $this->string(),
            'alamat_2' => $this->string(),
            'kelurahan' => $this->string(),
            'kecamatan' => $this->string(),
            'kota' => $this->string(),
            'provinsi' => $this->string(),
            'negara' => $this->string(),
            'kode_post' => $this->string(),
            'latitude' => $this->float(),
            'longitude' => $this->float(),
            'avatar' => $this->string()->defaultValue('avatar_organizer.jpg'),
            'nomor_telepon' => $this->string(16),
            'deskripsi' => $this->string(),
            'twitter' => $this->string(255),
            'instagram' => $this->string(255),
            'facebook' => $this->string(255),
            'whatsapp' => $this->string(16),
            'website' => $this->string(),
            'id_bank' => $this->integer(),
            'nomor_rekening' => $this->string(),
            'slug' => $this->string(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'is_verified' => $this->boolean(),
            'status_verifikasi'=>$this->string(15),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%pengguna}}', [
            'id' => $this->bigPrimaryKey(),
            'id_akun' => $this->bigInteger(),
            'prefix' => $this->string(2),
            'nama_depan' => $this->string(16)->notNull(),
            'nama_belakang' => $this->string(16),
            'nomor_hp' => $this->string(16),
            'jenis_kelamin' => $this->string(1),
            'tanggal_lahir' => $this->date(),
            'alamat_1' => $this->string(),
            'alamat_2' => $this->string(),
            'kelurahan' => $this->string(),
            'kecamatan' => $this->string(),
            'kota' => $this->string(),
            'provinsi' => $this->string(),
            'negara' => $this->string(),
            'kode_pos' => $this->string(6),
            'avatar' => $this->string(128)->defaultValue('avatar-pengguna.jpg'),
            'id_bank' => $this->integer(),
            'nomor_rekening' => $this->string(),
            'slug' => $this->string(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);


        $this->createTable('{{%bank}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
            'kode' => $this->string()->notNull(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);


        $this->createTable('{{%organisasi}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%topik_event}}', [
            'id' => $this->primaryKey(),
            'nama_topik' => $this->string()->notNull(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%tipe_event}}', [
            'id' => $this->primaryKey(),
            'nama_tipe' => $this->string()->notNull(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%status_event}}', [
            'id' => $this->primaryKey(),
            'nama_status' => $this->string()->notNull(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%verifikasi_organizer}}', [
            'id' => $this->bigPrimaryKey(),
            'id_organizer' => $this->bigInteger(),
            'file_verifikasi' => $this->string(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%subscribe}}', [
            'id' => $this->bigPrimaryKey(),
            'id_pengguna' => $this->bigInteger(),
            'id_organizer' => $this->bigInteger(),
            'notification' => $this->boolean()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'is_deleted' => $this->boolean()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%wallet_organizer}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_organizer'=>$this->bigInteger()->notNull(),
            'saldo'=>$this->bigInteger()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'is_deleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);

        $this->createTable('{{%wallet_pengguna}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_pengguna'=>$this->bigInteger()->notNull(),
            'balance'=>$this->bigInteger()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'is_deleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);


        $this->createTable('{{%kategori_transaksi_wallet}}',[
            'id'=>$this->bigPrimaryKey(),
            'nama_transaksi'=>$this->string(),
            'is_deleted'=>$this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%status_transaksi}}',[
            'id'=>$this->primaryKey(),
            'nama_status'=>$this->string(),
            'is_deleted'=>$this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%transaksi_wallet_pengguna}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_wallet_pengguna'=>$this->bigInteger(),
            'id_kategori_transaksi_wallet'=>$this->bigInteger(),
            'jumlah'=>$this->bigInteger(),
            'waktu_transaksi'=>$this->integer(),
            'id_status_transaksi'=>$this->integer(),
            'is_deleted'=>$this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%transaksi_wallet_organizer}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_wallet_organizer'=>$this->bigInteger(),
            'id_kategori_transaksi_wallet'=>$this->bigInteger(),
            'jumlah'=>$this->bigInteger(),
            'waktu_transaksi'=>$this->integer(),
            'id_status_transaksi'=>$this->integer(),
            'is_deleted'=>$this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%event}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_organizer'=>$this->bigInteger(),
            'judul'=>$this->string()->notNull(),
            'lokasi'=>$this->string()->notNull(),
            'alamat_1'=>$this->string(),
            'alamat2'=>$this->string(),
            'kelurahan'=>$this->string(),
            'kecamatan'=>$this->string(),
            'kota'=>$this->string(),
            'provinsi'=>$this->string(),
            'negara'=>$this->string(),
            'latitude'=>$this->float(),
            'longitude'=>$this->float(),
            'waktu_mulai'=>$this->integer(),
            'waktu_selesai'=>$this->integer(),
            'poster_event'=>$this->string()->notNull(),
            'deskripsi'=>$this->text(),
            'is_private'=>$this->boolean(),
            'id_tipe'=>$this->integer()->notNull(),
            'id_topik'=>$this->integer()->notNull(),
            'tampilkan_sisa_tiket'=>$this->boolean()->notNull(),
            'instagram_link'=>$this->string(),
            'facebook_link'=>$this->string(),
            'twitter_link'=>$this->string(),
            'id_status_event'=>$this->integer(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'slug'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%ticket}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_event'=>$this->bigInteger(),
            'nama_tiket'=>$this->string(16),
            'jumlah'=>$this->integer(),
            'harga'=>$this->bigInteger(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%metode_pembayaran}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'is_deleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);

        $this->createTable('{{%status_pembayaran}}',[
            'id'=>$this->primaryKey(),
            'nama'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'is_deleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);

        $this->createTable('{{%transaksi_tiket}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_pengguna'=>$this->bigInteger(),
            'nomor_pembayaran'=>$this->string(),
            'id_metode_pembayaran'=>$this->integer(),
            'id_status_pembayaran'=>$this->integer(),
            'waktu_kadaluarsa'=>$this->integer(),
            'total_harga'=>$this->bigInteger(),
            'total_dibayar'=>$this->bigInteger(),
            'waktu_transaksi'=>$this->integer(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%detail_transaksi_tiket}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_transaksi'=>$this->bigInteger(),
            'id_ticket'=>$this->bigInteger(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%tiket_peserta}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_transaction'=>$this->bigInteger()->notNull(),
            'id_pengguna'=>$this->bigInteger()->notNull(),
            'is_present'=> $this->boolean()->notNull(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%topik_disukai}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_pengguna'=>$this->bigInteger()->notNull(),
            'id_topik'=>$this->integer()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'is_deleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);

        $this->createTable('{{%feedback}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_event'=>$this->bigInteger()->notNull(),
            'id_pengguna'=>$this->bigInteger()->notNull(),
            'rating'=>$this->float(),
            'pesan'=>$this->text(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'is_deleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);

        $this->createTable('{{%refund_tiket}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_transaction'=>$this->bigInteger(),
            'amount'=>$this->bigInteger(),
            'is_success'=>$this->boolean(),
            'comment'=>$this->string(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%kategori_report}}',[
            'id'=>$this->primaryKey(),
            'nama'=>$this->string(),
            'untuk'=>$this->string(),
            'is_deleted'=>$this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ],$tableOptions);

        $this->createTable('{{%report_event}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_kategori_report'=>$this->integer(),
            'id_event'=>$this->bigInteger(),
            'komentar'=>$this->text(),
            'is_deleted'=>$this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()

        ],$tableOptions);
        $this->createTable('{{%report_organizer}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_kategori_report'=>$this->integer(),
            'id_organizer'=>$this->bigInteger(),
            'komentar'=>$this->text(),
            'is_deleted'=>$this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()

        ],$tableOptions);

        $this->createTable('{{%report_pengguna}}',[
            'id'=>$this->bigPrimaryKey(),
            'id_kategori_report'=>$this->integer(),
            'id_penguna'=>$this->bigInteger(),
            'komentar'=>$this->text(),
            'is_deleted'=>$this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()

        ],$tableOptions);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('{{%report_pengguna}}');
        $this->dropTable('{{%report_organizer}}');
        $this->dropTable('{{%report_event}}');
        $this->dropTable('{{%kategori_report}}');
        $this->dropTable('{{%refund_tiket}}');
        $this->dropTable('{{%feedback}}');
        $this->dropTable('{{%topik_disukai}}');
        $this->dropTable('{{%tiket_peserta}}');
        $this->dropTable('{{%detail_transaksi_tiket}}');
        $this->dropTable('{{%transaksi_tiket}}');
        $this->dropTable('{{%status_pembayaran}}');
        $this->dropTable('{{%metode_pembayaran}}');
        $this->dropTable('{{%ticket}}');
        $this->dropTable('{{%event}}');
        $this->dropTable('{{%transaksi_wallet_organizer}}');
        $this->dropTable('{{%transaksi_wallet_pengguna}}');
        $this->dropTable('{{%status_transaksi}}');
        $this->dropTable('{{%transaksi_wallet}}');
        $this->dropTable('{{%wallet_pengguna}}');
        $this->dropTable('{{%wallet_organizer}}');
        $this->dropTable('{{%subscribe}}');
        $this->dropTable('{{%status_event}}');
        $this->dropTable('{{%tipe_event}}');
        $this->dropTable('{{%topik_event}}');
        $this->dropTable('{{%bank}}');
        $this->dropTable('{{%pengguna}}');
        $this->dropTable('{{%organizer}}');
        $this->dropTable('{{%admin}}');
        $this->dropTable('{{%login}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190414_101533_init_db_table cannot be reverted.\n";

        return false;
    }
    */
}
