<?php

namespace app\modules\admin\modules\landingElement\forms;

use app\modules\admin\modules\landingElement\models\Menu;
use yii\base\Model;

class MenuForm extends Model
{
    public Menu $model;

    public $name;
    public $order;
    public $status;
    public $icon;
    public $parent_id;
    public $type;
    public $position_menu;
    public $label_position;
    public $slug;
    public $item;

    public function __construct(Menu $model, $config = [])
    {
        $this->model = $model;
        $this->name = $model->name;
        $this->order = $model->order;
        $this->status = $model->status;
        $this->icon = $model->icon;
        $this->parent_id = $model->parent_id;
        $this->type = $model->type;
        $this->item = $model->item;
        $this->position_menu = $model->position_menu;
        $this->label_position = $model->label_position;
        $this->slug = $model->slug;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['name'], 'safe'],
            [['order', 'status', 'parent_id', 'type', 'position_menu', 'label_position'], 'integer'],
            [['icon', 'item'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::class, 'targetAttribute' => ['parent_id' => 'id']],
            [['name', 'type', 'position_menu'], 'required'],
            [['slug'], 'unique'],
            [['slug'], 'string', 'max' => 255],
        ];

    }

    public function attributeLabels()
    {
        return [
            'name' => translate('Name'),
            'order' => translate('Order'),
            'status' => translate('Status'),
            'icon' => translate('Icon'),
            'parent_id' => translate('Parent Id'),
            'type' => translate('Type'),
            'position_menu' => translate('Position Menu'),
            'label_position' => translate('Label Position'),
            'slug' => translate('Slug'),
            'item' => translate('Item'),
        ];
    }

    public function save()
    {
        $model = $this->model;
        $model->name = $this->name;
        $model->order = $this->order;
        $model->status = $this->status;
        $model->icon = $this->icon;
        $model->parent_id = $this->parent_id;
        $model->type = $this->type;
        $model->position_menu = $this->position_menu;
        $model->label_position = $this->label_position;
        $model->slug = $this->slug;
        $model->item = $this->item;
        if ($model->isNewRecord) {
            $model->created_at = date('Y-m-d H:i:s');
        }
        $model->updated_at = date('Y-m-d H:i:s');
        return $model->save();

    }

}