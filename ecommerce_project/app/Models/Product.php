<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Đảm bảo Laravel hiểu đúng bảng trong database

    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'category',
        'quantity',
    ]; // Cho phép gán dữ liệu hàng loạt

    // Nếu muốn có quan hệ với các model khác, có thể khai báo ở đây
}
