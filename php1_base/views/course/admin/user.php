<a href="<?=BASE_URL_ADMIN?>">trở lại</a><div class="content_header">
  <?php if (isset($message)) echo $message; ?>
    <div class="btn_into">
        <a href="<?=BASE_URL.'?mode=admin&name=user&action=create'?>"><button class="btn btn-primary">thêm khóa học</button></a><br><br>
        <a href="<?=BASE_URL.'?mode=admin&name=user&action=user'?>"><button class="btn btn-primary">quản lý người dùng</button></a><br><br>
    </div>
</div><hr>
<form action="" method="get" >
    <input type="hidden" name="mode" value="admin" id="">
    <input type="hidden" name="action" value="search_user" id="">
    <input type="text" name="search" id="">
    <button type="submit">tim kiem</button>
</form>
<table class="table">
    <tr>
        <th>định danh</th>
        <th>tên học sinh</th>
        <th>Emails</th>
        <th>hành động</th>
    </tr>
    <?php foreach($data as $v){?>
        <tr>
            <td><?=$v['id']?></td>
            <td><?=$v['username']?></td>
            <td><?=$v['email']?></td>
            <td>
                <a href="<?=BASE_URL.'?mode=admin&name=user&action=detail&id='.$v['id']?>"><button class="btn btn-primary">xem chi tiet</button></a>
                <a href="<?=BASE_URL.'?mode=admin&name=user&action=edit&id='.$v['id']?>"><button class="btn btn-primary">Sửa </button></a>
                <a href="<?=BASE_URL.'?mode=admin&name=user&action=delete&id='.$v['id']?>"><button class="btn btn-primary">xóa </button></a>
            </td>
        </tr>
    <?php }?>
</table>
