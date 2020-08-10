<?php 
  include './config/connection.php';
  include './config/function.php';
  isNotLoggedIn();
  $data = getPenjualan();
?>
<?php // index.php
while ($row = $data->fetch_object()): ?>
  <tr>
  <td><?= viewDate($row->waktu)?></td>
  <td>Rp. <?= number_format($row->total) ?></td>
  <td><?= $row->username ?></td>
  <td>
      <a href="detail_penjualan.php?id=<?=$row->id?>" class="btn btn-info">Detail</a>
      <a href="ubah_penjualan.php?id=<?=$row->id?>" class="btn btn-warning">Ubah</a>
  </td>
  </tr>
<?php endwhile; ?>