<?php

use yii\db\Migration;

/**
 * Class m190415_054032_add_table_relationship
 */
class m190415_054032_add_table_relationship extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk-akun-admin','{{%admin}}','id_akun','{{%akun}}','id');
        $this->addForeignKey('fk-akun-organizer','{{%organizer}}','id_akun','{{%akun}}','id');
        $this->addForeignKey('fk-akun-pengguna','{{%pengguna}}','id_akun','{{%akun}}','id');
        $this->addForeignKey('fk-organizer-organisasi','{{%organizer}}','id_organisasi','{{%organisasi}}','id');
        $this->addForeignKey('fk-organizer-bank','{{%organizer}}','id_bank','{{%bank}}','id');
        $this->addForeignKey('fk-pengguna-bank','{{%pengguna}}','id_bank','{{%bank}}','id');
        $this->addForeignKey('fk-organizer-verifikasi_organizer','{{%verifikasi_organizer}}','id_organizer','{{%organizer}}','id');
        $this->addForeignKey('fk-subscribe-pengguna','{{%subscribe}}','id_pengguna','{{%pengguna}}','id');
        $this->addForeignKey('fk-subscribe-organizer','{{%subscribe}}','id_organizer','{{%organizer}}','id');
        $this->addForeignKey('fk-wallet_organizer-organizer','{{%id_organizer}}','id_organizer','{{%organizer}}','id');
        $this->addForeignKey('fk-wallet_pengguna-pengguna','{{%wallet_pengguna}}','id_pengguna','{{%pengguna}}','id');
        $this->addForeignKey('fk-transaksi_wallet_pengguna-wallet_pengguna','{{%transaksi_wallet_pengguna}}','id_wallet_pengguna','{{%wallet_pengguna}}','id');
        $this->addForeignKey('fk-transaksi_wallet_pengguna-kategori_transaksi_wallet','{{%transaksi_wallet_pengguna}}','id_kategori_transaksi_wallet','{{%kategori_transaksi_wallet}}','id');
        $this->addForeignKey('fk-transaksi_wallet_pengguna-status_transaksi','{{%transaksi_wallet_pengguna}}','id_status_transaksi','{{%status_transaksi}}','id');
        $this->addForeignKey('fk-transaksi_wallet_organizer-wallet_organizer','{{%transaksi_wallet_organizer}}','id_wallet_organizer','{{%wallet_organizer}}','id');
        $this->addForeignKey('fk-transaksi_wallet_organizer-kategori_transaksi_wallet','{{%transaksi_wallet_organizer}}','id_kategori_transaksi_wallet','{{%kategori_transaksi_wallet}}','id');
        $this->addForeignKey('fk-transaksi_wallet_organizer-status_transaksi','{{%transaksi_wallet_organizer}}','id_status_transaksi','{{%status_transaksi}}','id');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-transaksi_wallet_organizer-status_transaksi','{{%transaksi_wallet_organizer}}');
        $this->dropForeignKey('fk-transaksi_wallet_organizer-kategori_transaksi_wallet','{{%transaksi_wallet_organizer}}');
        $this->dropForeignKey('fk-transaksi_wallet_organizer-wallet_organizer','{{%transaksi_wallet_organizer}}');
        $this->dropForeignKey('fk-transaksi_wallet_pengguna-status_transaksi','{{%transaksi_wallet_pengguna}}');
        $this->dropForeignKey('fk-transaksi_wallet_pengguna-kategori_transaksi_wallet','{{%transaksi_wallet_pengguna}}');
        $this->dropForeignKey('fk-transaksi_wallet_pengguna-wallet_pengguna','{{%transaksi_wallet_pengguna}}');
        $this->dropForeignKey('fk-wallet_pengguna-pengguna','{{%wallet_pengguna}}');
        $this->dropForeignKey('fk-wallet_organizer-organizer','{{%organizer}}');
        $this->dropForeignKey('fk-subscribe-organizer','{{%subscribe}}');
        $this->dropForeignKey('fk-subscribe-pengguna','{{%subscribe}}');
        $this->dropForeignKey('fk-organizer-verifikasi_organizer','{{%verifikasi_organizer}}');
        $this->dropForeignKey('fk-organizer-bank','{{%organizer}}');
        $this->dropForeignKey('fk-organizer-organisasi','{{%organizer}}');
        $this->dropForeignKey('fk-akun-pengguna','{{%pengguna}}');
        $this->dropForeignKey('fk-akun-organizer','{{%organizer}}');
        $this->dropForeignKey('fk-akun-admin','{{%admin}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190415_054032_add_table_relationship cannot be reverted.\n";

        return false;
    }
    */
}
