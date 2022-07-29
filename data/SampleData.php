<?php

require_once("../config/Database.php");
require_once("../library/ssp.class.php");

if (isset($_GET['d']) && $_GET['d'] == 'transaction') {

  $sqlConnection = [
    'host' => $databaseHost,
    'user' => $databaseUsername,
    'pass' => $databasePassword,
    'db'   => $databaseName,
  ];

  # Single
  // $table = 'tbl_m_transaction_cashier';

  /**
   * Data diambil dari data Apotek Siti Khadijah Dikarenakan sudah banyak data
   * Total data 23.387 
   */
  # Query Complex
  $table = "(
    SELECT 
      mtc.id_mtc,
      mtc.no_invoice_mtc,
      mtc.date_payment_mtc,
      mtc.no_client_mcc,
      mtc.name_client_mcc,
      mcc.name_mcc
    FROM tbl_m_transaction_cashier mtc
    JOIN tbl_m_client_clinic mcc ON mtc.id_mcc = mcc.id_mcc
 ) user";

  $primaryKey = 'id_mtc';

  $columns = [
    [
      'db' => 'id_mtc',
      'dt' => 0
    ],
    [
      'db' => 'no_invoice_mtc',
      'dt' => 1
    ],
    [
      'db' => 'date_payment_mtc',
      'dt' => 2
    ],
    [
      'db' => 'name_mcc',
      'dt' => 3
    ],
    [
      'db' => 'no_client_mcc',
      'dt' => 4
    ],
    [
      'db' => 'name_client_mcc',
      'dt' => 5
    ],
    [
      'db' => 'id_mtc',
      'dt' => 6,
      'formatter' => function ($d, $row) {
        return "<button class='btn btn-outline-primary btn-sm' onclick='onView({$d})'>view</button>";
      }
    ]
  ];

  echo json_encode(SSP::simple($_GET, $sqlConnection, $table, $primaryKey, $columns));
}
