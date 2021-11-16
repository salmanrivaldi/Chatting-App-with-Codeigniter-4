<?php

namespace App\Models;

use CodeIgniter\Model;

class MessagesModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'messages';
    protected $primaryKey           = 'message_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['receiver_id', 'sender_id', 'message'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function get_chat($receiver_id)
    {
        $user_id = session()->get('user_id');
        return $this->join('users', 'users.user_id=messages.sender_id', 'left')
            ->groupStart()->where('sender_id', $user_id)->where('receiver_id', $receiver_id)->groupEnd()
            ->orGroupStart()->where('sender_id', $receiver_id)->where('receiver_id', $user_id)->groupEnd()
            ->orderBy('message_id')
            ->get()->getResult();
    }
}
