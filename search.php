<?php

$cate = get_category($_GET['c']);
?>



		<div class="content">
			<div class="container">

				<!-- 建立第一個 row 空間，裡面準備放格線系統 -->
				<div class="row">
					<!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
					<div class="col-xs-12">
						<?php if(!empty($datas)):?>
							<?php $temp = 'NULL';foreach($cate as $row):?>
							<!-- 使用 bootstrap 的 panel 來呈現 http://getbootstrap.com/components/#panels-->
							<div class="panel panel-primary">
								<?php  if($temp!=$row['shop_name']):?>
										<div class="panel-heading">
												<h3 class="panel-title">
													<a><?php if($temp!=$row['shop_name'])echo $row["shop_name"]; ?></a>
												</h3>
										</div>
								<?php endif; ?>
										<div class="panel-body">
											<p>
												<?php echo $row['product_name'];?>
												<br>
												<span class="label label-info">價格:<?php echo $row['price']; ?></span>&nbsp;
												<br>
												<span class="label label-danger">
													<?php
														switch ($row['size']) {
															case '1':
																echo "SIZE:小";
																break;
															case '2':
																echo "SIZE:中";
																break;
															case '3':
																echo "SIZE:大";
																break;
															case '4':
																echo "SIZE:特大";
																break;
															default:
																# code...
																break;
														}
													 ?>
												 </span>
											</p>
											<?php $temp = $row['shop_name'];?>
										</div>
								</div>
								<?php endforeach; ?>
						<?php else: ?>
							<h3 class="text-center">尚無文章</h3>
							<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
