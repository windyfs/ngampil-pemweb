/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     12/06/2023 13:02:02                          */
/*==============================================================*/


drop table if exists ADMIN;

drop table if exists ALAMAT;

drop table if exists CUSTOMER;

drop table if exists GENDER;

drop table if exists KATEGORI_PRODUK;

drop table if exists KOTA;

drop table if exists PENGIRIMAN;

drop table if exists PRODUK;

drop table if exists SIZE_PRODUK;

drop table if exists STOK;

drop table if exists TRANSAKSI_DETAIL;

drop table if exists TRANSAKSI_HEADER;

drop table if exists WARNA_PRODUK;

/*==============================================================*/
/* Table: ADMIN                                                 */
/*==============================================================*/
create table ADMIN
(
   ID_ADMIN             varchar(10) not null,
   NAMA_ADMIN           varchar(100),
   USERNAME_ADMIN       varchar(100),
   PASSWORD_ADMIN       varchar(100),
   EMAIL_ADMIN          varchar(100),
   NOTELP_ADMIN         numeric(15,0),
   primary key (ID_ADMIN)
);

/*==============================================================*/
/* Table: ALAMAT                                                */
/*==============================================================*/
create table ALAMAT
(
   ID_ALAMAT            varchar(10) not null,
   ID_KOTA              varchar(10) not null,
   ID_SHIPPING          varchar(10) not null,
   NAMA_JALAN           varchar(200),
   NO_JALAN             numeric(10,0),
   KODE_POS             numeric(10,0),
   primary key (ID_ALAMAT)
);

/*==============================================================*/
/* Table: CUSTOMER                                              */
/*==============================================================*/
create table CUSTOMER
(
   ID_CUSTOMER          varchar(10) not null,
   ID_ADMIN             varchar(10) not null,
   ID_GENDER            varchar(20) not null,
   NAMA_CUSTOMER        varchar(100),
   USERNAME             varchar(100),
   EMAIL                varchar(100),
   PASSWORD             varchar(100),
   NOTELP_CUSTOMER      numeric(15,0),
   primary key (ID_CUSTOMER)
);

/*==============================================================*/
/* Table: GENDER                                                */
/*==============================================================*/
create table GENDER
(
   ID_GENDER            varchar(20) not null,
   NAMA_GENDER          varchar(20),
   primary key (ID_GENDER)
);

/*==============================================================*/
/* Table: KATEGORI_PRODUK                                       */
/*==============================================================*/
create table KATEGORI_PRODUK
(
   ID_KATEGORI          varchar(10) not null,
   NAMA_KATEGORI        varchar(100),
   primary key (ID_KATEGORI)
);

/*==============================================================*/
/* Table: KOTA                                                  */
/*==============================================================*/
create table KOTA
(
   ID_KOTA              varchar(10) not null,
   NAMA_KOTA            varchar(60),
   COST_SHIPPING        int,
   primary key (ID_KOTA)
);

/*==============================================================*/
/* Table: PENGIRIMAN                                            */
/*==============================================================*/
create table PENGIRIMAN
(
   ID_SHIPPING          varchar(10) not null,
   METODE_PENGIRIMAN    varchar(100),
   NAMA_EKSPEDISI       varchar(100),
   BIAYA_KIRIM          int,
   primary key (ID_SHIPPING)
);

/*==============================================================*/
/* Table: PRODUK                                                */
/*==============================================================*/
create table PRODUK
(
   ID_PRODUK            varchar(10) not null,
   ID_KATEGORI          varchar(10) not null,
   ID_WARNA             varchar(10) not null,
   ID_SIZE              varchar(10) not null,
   NAMA_PRODUK          varchar(100),
   HARGA_PRODUK         int,
   primary key (ID_PRODUK)
);

/*==============================================================*/
/* Table: SIZE_PRODUK                                           */
/*==============================================================*/
create table SIZE_PRODUK
(
   ID_SIZE              varchar(10) not null,
   NAMA_SIZE            varchar(5),
   primary key (ID_SIZE)
);

/*==============================================================*/
/* Table: STOK                                                  */
/*==============================================================*/
create table STOK
(
   ID_STOK              varchar(10) not null,
   ID_ADMIN             varchar(10) not null,
   ID_PRODUK            varchar(10) not null,
   JUMLAH_STOK          int,
   primary key (ID_STOK)
);

/*==============================================================*/
/* Table: TRANSAKSI_DETAIL                                      */
/*==============================================================*/
create table TRANSAKSI_DETAIL
(
   NO_DETAIL            varchar(10) not null,
   ID_PRODUK            varchar(10) not null,
   NO_TRANSAKSI         varchar(10) not null,
   JUMLAH_SEWA          int,
   HARGA_SATUAN         int,
   LAMA_SEWA            int,
   MULAI_SEWA           date,
   AKHIR_SEWA           date,
   TOTAL_SEWA           int,
   STATUS               varchar(20),
   primary key (NO_DETAIL)
);

/*==============================================================*/
/* Table: TRANSAKSI_HEADER                                      */
/*==============================================================*/
create table TRANSAKSI_HEADER
(
   NO_TRANSAKSI         varchar(10) not null,
   ID_CUSTOMER          varchar(10) not null,
   ID_SHIPPING          varchar(10) not null,
   ID_ADMIN             varchar(10) not null,
   TGL_TRANSAKSI        date,
   TOTAL_TRANSAKSI      int,
   TOTAL_PEMBAYARAN     int,
   METODE_PEMBAYARAN    varchar(100),
   primary key (NO_TRANSAKSI)
);

/*==============================================================*/
/* Table: WARNA_PRODUK                                          */
/*==============================================================*/
create table WARNA_PRODUK
(
   ID_WARNA             varchar(10) not null,
   NAMA_WARNA           varchar(100),
   primary key (ID_WARNA)
);

alter table ALAMAT add constraint FK_MEMILIKI5 foreign key (ID_KOTA)
      references KOTA (ID_KOTA) on delete restrict on update restrict;

alter table ALAMAT add constraint FK_RELATIONSHIP_12 foreign key (ID_SHIPPING)
      references PENGIRIMAN (ID_SHIPPING) on delete restrict on update restrict;

alter table CUSTOMER add constraint FK_RELATIONSHIP_15 foreign key (ID_ADMIN)
      references ADMIN (ID_ADMIN) on delete restrict on update restrict;

alter table CUSTOMER add constraint FK_RELATIONSHIP_16 foreign key (ID_GENDER)
      references GENDER (ID_GENDER) on delete restrict on update restrict;

alter table PRODUK add constraint FK_MEMILIKI1 foreign key (ID_SIZE)
      references SIZE_PRODUK (ID_SIZE) on delete restrict on update restrict;

alter table PRODUK add constraint FK_MEMILIKI2 foreign key (ID_WARNA)
      references WARNA_PRODUK (ID_WARNA) on delete restrict on update restrict;

alter table PRODUK add constraint FK_MEMILIKI3 foreign key (ID_KATEGORI)
      references KATEGORI_PRODUK (ID_KATEGORI) on delete restrict on update restrict;

alter table STOK add constraint FK_MEMILIKI foreign key (ID_PRODUK)
      references PRODUK (ID_PRODUK) on delete restrict on update restrict;

alter table STOK add constraint FK_RELATIONSHIP_13 foreign key (ID_ADMIN)
      references ADMIN (ID_ADMIN) on delete restrict on update restrict;

alter table TRANSAKSI_DETAIL add constraint FK_RELATIONSHIP_10 foreign key (ID_PRODUK)
      references PRODUK (ID_PRODUK) on delete restrict on update restrict;

alter table TRANSAKSI_DETAIL add constraint FK_TRANSAKSI foreign key (NO_TRANSAKSI)
      references TRANSAKSI_HEADER (NO_TRANSAKSI) on delete restrict on update restrict;

alter table TRANSAKSI_HEADER add constraint FK_RELATIONSHIP_11 foreign key (ID_CUSTOMER)
      references CUSTOMER (ID_CUSTOMER) on delete restrict on update restrict;

alter table TRANSAKSI_HEADER add constraint FK_RELATIONSHIP_14 foreign key (ID_ADMIN)
      references ADMIN (ID_ADMIN) on delete restrict on update restrict;

alter table TRANSAKSI_HEADER add constraint FK_RELATIONSHIP_8 foreign key (ID_SHIPPING)
      references PENGIRIMAN (ID_SHIPPING) on delete restrict on update restrict;

