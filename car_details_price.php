<?php
session_start();
$_SESSION['sdate'] = $_GET['sdate'];
$_SESSION['edate'] = $_GET['edate'];

$sdate = new DateTime($_GET['sdate']);
$edate = new DateTime($_GET['edate']);

$diff = $edate->diff($sdate)->format("%a") + 1;

echo '<label for="comunity-name">Charges</label>
                            <font size="3">
                                <table class="table table-responsive product-dashboard-table mb-20">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span>'.$_SESSION['price'].'</span>
                                                <span> x </span>
                                                <span id="days">'.$diff.' day</span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span is="subtotal">P'.$_SESSION['price']*$diff.'</span>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td>
                                                <span>Service Fees: </span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span>P 0.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Initial Gas Fees: </span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span>P 0.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Additional Fees: </span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span>P 0.00</span>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <span><strong>Total: </strong></span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span><strong>P '.$_SESSION['price']*$diff.'</strong></span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </font>';
?>