<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\FuncCall;

class ArticleModel extends Model
{
    protected $table = 'article';
    
    protected $allowedFields = ['title', 'content'];
    
    protected $returnType = \App\Entities\Article::class;
    
    protected $validationRules = [
        'title' => 'required|max_length[128]',
        'content' => 'required'
    ];
    protected $validationMessages = [
        'title' => [
            'required' => 'Please enter a title',
            'max_length' => '{param} maximum characters for the {field}'
        ],
        'content' => [
            'required' => 'Please enter the content'
        ]
    ];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $beforeInsert = ['setUsersID'];

    

    protected function setUsersID(array $data)
    {
        $data['data']['users_id'] = auth()->user()->id;
        return $data;
    }
}
