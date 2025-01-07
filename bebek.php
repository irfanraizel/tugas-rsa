<?php
                            // Include koneksi dan fungsi dekripsi
                            include("koneksi.php");
                            include("function.php");

                            // Query untuk mengambil data transaksi
                            $sql = "SELECT no_ref, no_rekening, nama_user, email, telp, nama_barang, harga, alamat, metode, created_at FROM transaksi";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $no = 1; // Nomor urut
                                while ($row = $result->fetch_assoc()) {
                                    // Dekripsi data
                                    $no_rekening = json_decode($row['no_rekening']);
                                    $nama_user = json_decode($row['nama_user']);
                                    $email = json_decode($row['email']);
                                    $telp = json_decode($row['telp']);
                                    $nama_barang = json_decode($row['nama_barang']);
                                    $alamat = json_decode($row['alamat']);

                                    echo "<tr>
                                        <td>$no</td>
                                        <td>{$row['no_ref']}</td>
                                        <td>$no_rekening</td>
                                        <td>$nama_user</td>
                                        <td>$email</td>
                                        <td>$telp</td>
                                        <td>$nama_barang</td>
                                        <td>{$row['harga']}</td>
                                        <td>$alamat</td>
                                        <td>{$row['metode']}</td>
                                        <td>{$row['created_at']}</td>
                                    </tr>";
                                    $no++;
                                }
                            } else {
                                echo "<tr><td colspan='11' class='text-center'>Tidak ada data transaksi</td></tr>";
                            }

                            // Tutup koneksi
                            $conn->close();
                            ?>