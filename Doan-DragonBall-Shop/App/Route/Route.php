<?php
#user
$route['them-danh-muc'] = 'admin/menu/add';

$route['danh-sach-danh-muc'] = 'admin/menu/lists';

$route['chinh-sua-danh-muc'] = 'admin/menu/edit';

$route['cap-nhat-danh-muc'] = 'admin/menu/update';

$route['xoa-danh-muc'] = 'admin/menu/delete';

$route['them-san-pham'] = 'admin/product/add';

$route['danh-sach-san-pham'] = 'admin/product/lists';

$route['xoa-san-pham'] = 'admin/product/delete';

$route['cap-nhat-san-pham'] = 'admin/product/update';

$route['danh-sach-gio-hang.html'] = 'admin/cart';

$route['chi-tiet-gio-hang.html'] = 'admin/cart/view';

#client
$route['danh-muc'] = 'menu/get';
 
$route['chi-tiet-san-pham'] = 'product/get'; 

$route['gio-hang.html'] = 'cart';

$route['cap-nhat-gio-hang.html'] = 'cart/update';

$route['xoa-san-pham.html'] = 'cart/remove';

$route['dat-hang.html'] = 'cart/book';

