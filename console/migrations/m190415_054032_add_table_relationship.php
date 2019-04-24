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
        $this->addForeignKey('fk-event-organizer','{{%event}}','id_organizer','{{%organizer}}','id');
        $this->addForeignKey('fk-event-tipe_event','{{%event}}','id_tipe','{{%tipe_event}}','id');
        $this->addForeignKey('fk-event-topik_event','{{%event}}','id_toptik','{{%topik_event}}','id');
        $this->addForeignKey('fk-event-status_event','{{%event}}','id_status_event','{{%status_event}}','id');
        $this->addForeignKey('fk-tiket-event','{{%tiket}}','id_event','{{%event}}','id');
        $this->addForeignKey('fk-transkasi_tiket-pengguna','{{%transaksi_tiket}}','id_pengguna','{{%pengguna}}','id');
        $this->addForeignKey('fk-transaksi_tiket-metode_pembayaran','{{%transaksi_tiket}}','id_metode_pembayaran','{{%metode_pembayaran}}','id');
        $this->addForeignKey('fk-transaksi_tiket-status_pembayaran','{{%transaksi_tiket}}','id_status_pembayaran','{{%status_pembayaran}}','id');
        $this->addForeignKey('fk-detail_transaksi_tiket-transaksi_tiket','{{%detail_transaksi_tiket}}','id_transaksi','{{%transaksi_tiket}}','id');
        $this->addForeignKey('fk-detail_transkasi_tiket-tiket','{{%detail_transaksi_tiket}}','id_tiket','{{%tiket}}','id');
        $this->addForeignKey('fk-tiket_perserta-transaksi_tiket','{{%tiket_peserta}}','id_transaksi','{{%transaksi_tiket}}','id');
        $this->addForeignKey('fk-tiket_peserta-pengguna','{{%tiket_peserta}}','id_pengguna','{{%pengguna}}','id');
        $this->addForeignKey('fk-topik_disukai-pengguna','{{%topik_disukai}}','id_pengguna','{{%pengguna}}','id');
        $this->addForeignKey('fk-topik_disukai-topik','{{%topik_disukai}}','id_topik','{{%topik}}','id');
        $this->addForeignKey('fk-feedback-event','{{%feedback}}','id_event','{{%event}}','id');
        $this->addForeignKey('fk-feedback-pengguna','{{%feedback}}','id_pengguna','{{%pengguna}}','id');
        $this->addForeignKey('fk-refund_tiket-transaksi','{{%refund_tiket}}','id_transaksi','{{%transaksi_tiket}}','id');
        $this->addForeignKey('fk-report_event-kategori_report','{{%report_event}}','id_kategori_report','{{%kategori_report}}','id');
        $this->addForeignKey('fk-report_event-event','{{%report_event}}','id_event','{{%event}}','id');
        $this->addForeignKey('fk-report_organizer-kategori_report','{{%report_organizer}}','id_kategori_report','{{%kategori_report}}','id');
        $this->addForeignKey('fk-report_organizer-organizer','{{%report_organizer}}','id_organizer','{{%organizer}}','id');
        $this->addForeignKey('fk-report_pengguna-kategori_report','{{%report_pengguna}}','id_kategori_report','{{%kategori_report}}','id');
        $this->addForeignKey('fk-report_pengguna-pengguna','{{%report_pengguna}}','id_pengguna','{{%pengguna}}','id');
        
    
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addForeignKey('fk-report_pengguna-pengguna','{{%report_pengguna}}');
        $this->addForeignKey('fk-report_pengguna-kategori_report','{{%report_pengguna}}');
        $this->addForeignKey('fk-report_organizer-organizer','{{%report_organizer}}');
        $this->addForeignKey('fk-report_organizer-kategori_report','{{%report_organizer}}');
        $this->addForeignKey('fk-report_event-event','{{%report_event}}');
        $this->dropForeignKey('fk-report_event-kategori_report','{{%report_event}}');
        $this->dropForeignKey('fk-refund_tiket-transaksi','{{%refund_tiket}}');
        $this->dropForeignKey('fk-feedback-pengguna','{{%feedback}}');
        $this->dropForeignKey('fk-feedback-event','{{%feedback}}');
        $this->dropForeignKey('fk-topik_disukai-topik','{{%topik_disukai}}');
        $this->dropForeignKey('fk-topik_disukai-pengguna','{{%topik_disukai}}');
        $this->dropForeignKey('fk-tiket_peserta-pengguna','{{%tiket_peserta}}');
        $this->dropForeignKey('fk-tiket_peserta-transaksi_tiket','{{%tiket_peserta}}');
        $this->dropForeignKey('fk-detail_transaksi_tiket-tiket','{{%detail_transaksi_tiket}}');
        $this->dropForeignKey('fk-detail_transaksi_tiket-transaksi_tiket','{{%detail_transaksi_tiket}}');
        $this->dropForeignKey('fk-transaksi_tiket-pengguna','{{%transaksi_tiket}}');
        $this->dropForeignKey('fk-transaksi_tiket-metode_pembayaran','{{%transaksi_tiket}}');
        $this->dropForeignKey('fk-transaksi_tiket-status_pembayaran','{{%transaksi_tiket}}');
        $this->dropForeignKey('fk-tiket-event','{{%event}}');
        $this->dropForeignKey('fk-event-status_event','{{%event}}');
        $this->dropForeignKey('fk-event-topik_event','{{%event}}');
        $this->dropForeignKey('fk-event-tipe_event','{{%event}}');
        $this->dropForeignKey('fk-event-organizer','{{%event}}');
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
