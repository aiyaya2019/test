<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateUsersTable extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {

        $table = $this->table('admin', ['id' => 'id', 'comment' => '管理员表', 'engine' => 'MyISAM', '']);
        $table->addColumn('role_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '角色id，admin_role表id'])
            ->addColumn('name', 'string', ['limit' => 50, 'default' => '', 'comment' => '管理员名称',])
            ->addColumn('account', 'string', ['limit' => 50, 'default' => '', 'comment' => '账号',])
            ->addColumn('password', 'string', ['limit' => 100, 'default' => '', 'comment' => '密码',])
            ->addColumn('addtime', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->addIndex(['account'], ['unique' => true])//为user_name创建索引并设置唯一(唯一索引)
            ->create();

        $table = $this->table('admin_role', ['id' => 'id', 'comment' => '管理员角色表', 'engine' => 'MyISAM', '']);
        $table->addColumn('name', 'string', ['limit' => 50, 'default' => '', 'comment' => '角色名称',])
            ->addColumn('allow_page', 'text', ['default' => '', 'comment' => '有权限的页面菜单ID集',])
            ->addColumn('disable_btn', 'text', ['default' => '', 'comment' => '没权限的按钮api(controller/function)',])
            ->addColumn('status', 'boolean', ['limit' => 1, 'default' => '0', 'comment' => '状态 0有效 1无效',])
            ->addColumn('desc', 'string', ['limit' => 200, 'default' => '', 'comment' => '角色描述',])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('banner', ['id' => 'id', 'comment' => '轮播图表', 'engine' => 'MyISAM', '']);
        $table->addColumn('name', 'string', ['limit' => 100, 'default' => '', 'comment' => '名称',])
            ->addColumn('img', 'string', ['limit' => 255, 'default' => '', 'comment' => '图片url',])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('bean', ['id' => 'id', 'comment' => '生豆信息', 'engine' => 'InnoDB', '']);
        $table->addColumn('user_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '发布者id，user表id'])
            ->addColumn('garden_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '庄园id，garden表id,庄园Id为空时使用公司Id（后期）'])
            ->addColumn('company_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '公司id'])
            ->addColumn('bean_name', 'string', ['limit' => 255, 'default' => '', 'comment' => '生豆名称',])
            ->addColumn('bean_img', 'string', ['limit' => 255, 'default' => '', 'comment' => '生豆图片',])
            ->addColumn('bean_score', 'float', ['precision' => 6, 'scale' => 2, 'default' => '0.00', 'comment' => '生豆评分',])
            ->addColumn('country_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '原产国id，country表id'])
            ->addColumn('city', 'string', ['limit' => 255, 'default' => '', 'comment' => '产地',])
            ->addColumn('type_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '豆种编号:0为其他，大于零对应生豆品种表bean_typeid'])
            ->addColumn('type_name', 'string', ['limit' => 255, 'default' => '', 'comment' => '豆种名称,若type_id为0则从此处调用名称',])
            ->addColumn('level_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '生豆等级id，bean_level表id'])
            ->addColumn('level_name', 'string', ['limit' => 255, 'default' => '', 'comment' => '等级名称，用户输入',])
            ->addColumn('process', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '处理法大类：1水洗；2日晒；3蜜处理；4湿刨',])
            ->addColumn('year', 'boolean', ['limit' => 1, 'default' => '0', 'comment' => '年份',])
            ->addColumn('output_quarter', 'string', ['limit' => 255, 'default' => '', 'comment' => '产季。格式：年份+斜杠+下一年份',])
            ->addColumn('height', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '海拔/米'])
            ->addColumn('recovery_month', 'string', ['limit' => 255, 'default' => '', 'comment' => '采收月份',])
            ->addColumn('density', 'string', ['limit' => 50, 'default' => '', 'comment' => '密度',])
            ->addColumn('annual_output', 'integer', ['limit' => 6, 'default' => '0', 'comment' => '年产量/吨'])
            ->addColumn('recommend_info', 'string', ['limit' => 255, 'default' => '', 'comment' => '推荐信息',])
            ->addColumn('water_content', 'string', ['limit' => 255, 'default' => '', 'comment' => '含水量',])
            ->addColumn('water_activity', 'string', ['limit' => 255, 'default' => '', 'comment' => '水活性',])
            ->addColumn('count', 'string', ['limit' => 255, 'default' => '', 'comment' => '目数',])
            ->addColumn('flavor', 'string', ['limit' => 255, 'default' => '', 'comment' => '风味',])
            ->addColumn('recom_use', 'string', ['limit' => 255, 'default' => '', 'comment' => '推荐用途',])
            ->addColumn('collect_num', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '收藏数量'])
            ->addColumn('status', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '审核状态：1提交待审核；2审核不通过；3审核通过',])
            ->addColumn('submit_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '提交审核时间'])
            ->addColumn('identify_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '审核时间'])
            ->addColumn('disable_btn', 'text', ['default' => '', 'comment' => '没权限的按钮api(controller/function)',])
            ->addColumn('desc', 'string', ['limit' => 200, 'default' => '', 'comment' => '角色描述',])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('bean_level', ['id' => 'id', 'comment' => '生豆等级', 'engine' => 'MyISAM', '']);
        $table->addColumn('name', 'string', ['limit' => 50, 'default' => '', 'comment' => '等级名称',])
            ->addColumn('is_delete', 'boolean', ['limit' => 1, 'default' => '0', 'comment' => '0未删除；1删除',])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('bean_type', ['id' => 'id', 'comment' => '生豆种类', 'engine' => 'MyISAM', '']);
        $table->addColumn('bean_num', 'string', ['limit' => 50, 'default' => '', 'comment' => '序号',])
            ->addColumn('name', 'string', ['limit' => 100, 'default' => '', 'comment' => '种类名称',])
            ->addColumn('name_en', 'string', ['limit' => 100, 'default' => '', 'comment' => '英文名',])
            ->addColumn('is_delete', 'boolean', ['limit' => 1, 'default' => '0', 'comment' => '0未删除；1删除',])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('config', ['id' => 'id', 'comment' => '配置表', 'engine' => 'InnoDB', '']);
        $table->addColumn('title', 'string', ['limit' => 255, 'default' => '', 'comment' => '网站标题',])
            ->addColumn('logo', 'string', ['limit' => 100, 'default' => '', 'comment' => '网站logo',])
            ->addColumn('wx_appid', 'string', ['limit' => 100, 'default' => '', 'comment' => '微信APPID',])
            ->addColumn('wx_appsecret', 'string', ['limit' => 100, 'default' => '', 'comment' => '微信appsecret',])
            ->addColumn('appid', 'string', ['limit' => 100, 'default' => '', 'comment' => '小程序APPID',])
            ->addColumn('appsecret', 'string', ['limit' => 100, 'default' => '', 'comment' => '小程序appsecret',])
            ->addColumn('key', 'string', ['limit' => 100, 'default' => '', 'comment' => '微信支付key',])
            ->addColumn('mchid', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '商户号'])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('country', ['id' => 'id', 'comment' => '原产国', 'engine' => 'MyISAM', '']);
        $table->addColumn('num', 'string', ['limit' => 100, 'default' => '', 'comment' => '编号',])
            ->addColumn('name', 'string', ['limit' => 100, 'default' => '', 'comment' => '名称',])
            ->addColumn('sort', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '排序'])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('cupping_test', ['id' => 'id', 'comment' => '杯测表记录', 'engine' => 'InnoDB', '']);
        $table->addColumn('user_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '发布者id，user表id'])
            ->addColumn('bean_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '生豆Id，bean表id'])
            ->addColumn('from_num', 'string', ['limit' => 30, 'default' => '', 'comment' => '杯测表编号不唯一，新增时自动生成',])
            ->addColumn('month', 'integer', ['limit' => 6, 'default' => '0', 'comment' => '月，如：202308。生成杯测编号用'])
            ->addColumn('sample_name', 'string', ['limit' => 100, 'default' => '', 'comment' => '样品名称',])
            ->addColumn('sample_detail', 'string', ['limit' => 255, 'default' => '', 'comment' => '样品详情',])
            ->addColumn('roast_level', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '烘焙度：1~3由浅到深',])
            ->addColumn('ferment_level', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '发酵程度：1~4由无到高',])
            ->addColumn('roast_note', 'string', ['limit' => 255, 'default' => '', 'comment' => '第一个备注(烘焙发酵)',])
            ->addColumn('fragrance_score', 'float', ['precision' => 6, 'scale' => 2, 'default' => '0.00', 'comment' => '干香分数,最小间隔0.25',])
            ->addColumn('fragrance_level', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '干香强度：1~5由低到高',])
            ->addColumn('fragrance_note', 'string', ['limit' => 255, 'default' => '', 'comment' => '干香备注',])
            ->addColumn('aroma_score', 'float', ['precision' => 6, 'scale' => 2, 'default' => '0.00', 'comment' => '湿香分数：最小间隔0.25',])
            ->addColumn('aroma_level', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '湿香强度：1~5由低到高',])
            ->addColumn('aroma_note', 'string', ['limit' => 255, 'default' => '', 'comment' => '湿香备注',])
            ->addColumn('flavor_score', 'float', ['precision' => 6, 'scale' => 2, 'default' => '0.00', 'comment' => '风味分数：最小间隔0.25',])
            ->addColumn('flavor_level', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '风味强度：1~5由低到高',])
            ->addColumn('flavor_note', 'string', ['limit' => 255, 'default' => '', 'comment' => '风味备注',])
            ->addColumn('acidity_score', 'float', ['precision' => 6, 'scale' => 2, 'default' => '0.00', 'comment' => '酸质分数：最小间隔0.25',])
            ->addColumn('acidity_level', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '酸质强度：1~5由低到高',])
            ->addColumn('acidity_note', 'string', ['limit' => 255, 'default' => '', 'comment' => '酸质备注',])
            ->addColumn('body_score', 'float', ['precision' => 6, 'scale' => 2, 'default' => '0.00', 'comment' => '醇厚度分数：最小间隔0.25',])
            ->addColumn('body_level', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '醇厚度强度：1~5由低到高',])
            ->addColumn('body_note', 'string', ['limit' => 255, 'default' => '', 'comment' => '醇厚度备注',])
            ->addColumn('sweet_score', 'float', ['precision' => 6, 'scale' => 2, 'default' => '0.00', 'comment' => '甜感分数：最小间隔0.25',])
            ->addColumn('sweet_level', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '甜感强度：1~5由低到高',])
            ->addColumn('sweet_note', 'string', ['limit' => 255, 'default' => '', 'comment' => '甜感备注',])
            ->addColumn('after_score', 'float', ['precision' => 6, 'scale' => 2, 'default' => '0.00', 'comment' => '余韵分数：最小间隔0.25',])
            ->addColumn('after_level', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '余韵强度：1~5由低到高',])
            ->addColumn('after_note', 'string', ['limit' => 255, 'default' => '', 'comment' => '余韵备注',])
            ->addColumn('fresh_score', 'float', ['precision' => 6, 'scale' => 2, 'default' => '0.00', 'comment' => '新鲜度分数：最小间隔0.25',])
            ->addColumn('fresh_level', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '新鲜度强度：1~5由低到高',])
            ->addColumn('fresh_note', 'string', ['limit' => 255, 'default' => '', 'comment' => '新鲜度备注',])
            ->addColumn('smell_level', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '异味选择，一共五个选项，不选为0，选择为1，以二进制的形式存储，此处每个选择会在总分上扣两分',])
            ->addColumn('smell_note', 'string', ['limit' => 255, 'default' => '', 'comment' => '异味备注',])
            ->addColumn('uniformity_level', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '一致性选择，一共五个选项，不选为0，选择为1，以二进制的形式存储，此处每个选择会在总分上扣两分',])
            ->addColumn('uniformity_note', 'string', ['limit' => 255, 'default' => '', 'comment' => '一致性备注',])
            ->addColumn('total_note', 'string', ['limit' => 255, 'default' => '', 'comment' => '总备注',])
            ->addColumn('total_score', 'float', ['precision' => 6, 'scale' => 2, 'default' => '0.00', 'comment' => '总分',])
            ->addColumn('img', 'string', ['limit' => 100, 'default' => '', 'comment' => '图片地址',])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('garden', ['id' => 'id', 'comment' => '庄园信息', 'engine' => 'InnoDB', '']);
        $table->addColumn('user_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '发布者id，user表id'])
            ->addColumn('status', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '审核状态：1提交待审核；2审核不通过；3审核通过',])
            ->addColumn('name', 'string', ['limit' => 100, 'default' => '', 'comment' => '庄园名称',])
            ->addColumn('awards', 'string', ['limit' => 255, 'default' => '', 'comment' => '获奖',])
            ->addColumn('pv', 'string', ['limit' => 255, 'default' => '', 'comment' => '庄园简介',])
            ->addColumn('banner_img', 'text', ['default' => '', 'comment' => '庄园banner，代码限制5张',])
            ->addColumn('door_img', 'text', ['default' => '', 'comment' => '正门图片地址，代码限制2张',])
            ->addColumn('base_img', 'text', ['default' => '', 'comment' => '基地图片地址，代码限制2张',])
            ->addColumn('yard_img', 'text', ['default' => '', 'comment' => '晒场图片地址，代码限制2张',])
            ->addColumn('station_img', 'text', ['default' => '', 'comment' => '处理站图片地址，代码限制2张',])
            ->addColumn('device_img', 'text', ['default' => '', 'comment' => '设备图片地址，代码限制2张',])
            ->addColumn('other_img', 'text', ['default' => '', 'comment' => '其他图片地址，代码限制6张',])
            ->addColumn('state', 'boolean', ['limit' => 1, 'default' => '0', 'comment' => '0不下架；1下架',])
            ->addColumn('submit_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '提交审核时间'])
            ->addColumn('identify_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '审核时间'])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('menu', ['id' => 'id', 'comment' => '菜单表', 'engine' => 'MyISAM', '']);
        $table->addColumn('pid', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '父级菜单ID'])
            ->addColumn('title', 'string', ['limit' => 50, 'default' => '', 'comment' => '菜单名称',])
            ->addColumn('router', 'string', ['limit' => 100, 'default' => '', 'comment' => 'web路由名称',])
            ->addColumn('status', 'boolean', ['limit' => 1, 'default' => '0', 'comment' => '状态:0生效;1无效',])
            ->addColumn('sort', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '排序'])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('operate_log', ['id' => 'id', 'comment' => '操作日志', 'engine' => 'MyISAM', '']);
        $table->addColumn('admin_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '操作者id，admin表id'])
            ->addColumn('name', 'string', ['limit' => 50, 'default' => '', 'comment' => '操作者名称',])
            ->addColumn('controller', 'string', ['limit' => 100, 'default' => '', 'comment' => '控制器',])
            ->addColumn('action', 'string', ['limit' => 100, 'default' => '', 'comment' => '方法',])
            ->addColumn('controller_name', 'string', ['limit' => 100, 'default' => '', 'comment' => '控制器名称',])
            ->addColumn('action_name', 'string', ['limit' => 100, 'default' => '', 'comment' => '方法名称',])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('seeker', ['id' => 'id', 'comment' => '寻豆师认证信息', 'engine' => 'InnoDB', '']);
        $table->addColumn('user_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '用户id，user表id'])
            ->addColumn('status', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '审核状态：1提交待审核；2审核不通过；3审核通过',])
            ->addColumn('awards', 'string', ['limit' => 255, 'default' => '', 'comment' => '获奖',])
            ->addColumn('pv', 'string', ['limit' => 255, 'default' => '', 'comment' => '庄园简介',])
            ->addColumn('scafeel', 'integer', ['limit' => 11, 'default' => '0', 'comment' => 'SCA感官高级：0否；1是'])
            ->addColumn('scafeel_img', 'string', ['limit' => 255, 'default' => '', 'comment' => 'SCA感官证书图片',])
            ->addColumn('scacof', 'integer', ['limit' => 11, 'default' => '0', 'comment' => 'SCA咖啡师：0否；1是'])
            ->addColumn('scacof_img', 'string', ['limit' => 255, 'default' => '', 'comment' => 'SCA咖啡师证书图片',])
            ->addColumn('senior_scacof', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '职业技能高级咖啡师：0否；1是'])
            ->addColumn('senior_scacof_img', 'string', ['limit' => 255, 'default' => '', 'comment' => '职业技能高级咖啡师证书图片',])
            ->addColumn('gard', 'integer', ['limit' => 11, 'default' => '0', 'comment' => 'Q-Grader证书：0否；1是'])
            ->addColumn('gard_img', 'string', ['limit' => 255, 'default' => '', 'comment' => 'Q-Grader证书图片',])
            ->addColumn('submit_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '提交审核时间'])
            ->addColumn('identify_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '审核时间'])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('seeker_level', ['id' => 'id', 'comment' => '寻豆师等级', 'engine' => 'MyISAM', '']);
        $table->addColumn('name', 'string', ['limit' => 50, 'default' => '', 'comment' => '等级名称',])
            ->addColumn('is_delete', 'boolean', ['limit' => 1, 'default' => '0', 'comment' => '0未删除；1删除',])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('user', ['id' => 'id', 'comment' => '用户表', 'engine' => 'InnoDB', '']);
        $table->addColumn('real_name', 'string', ['limit' => 100, 'default' => '', 'comment' => '真实姓名',])
            ->addColumn('username', 'string', ['limit' => 255, 'default' => '', 'comment' => '用户昵称',])
            ->addColumn('head_img', 'string', ['limit' => 255, 'default' => '', 'comment' => '用户头像',])
            ->addColumn('phone', 'string', ['limit' => 33, 'default' => '', 'comment' => '手机号码',])
            ->addColumn('openid', 'string', ['limit' => 50, 'default' => '', 'comment' => '用户openid',])
            ->addColumn('type', 'boolean', ['limit' => 1, 'default' => '1', 'comment' => '类型：0普通用户;1已认证寻豆师;2审核中寻豆师;3已认证庄园;4审核中庄园;5审核中评委；6评委审核不通过；7已认证评委',])
            ->addColumn('sex', 'boolean', ['limit' => 1, 'default' => '3', 'comment' => '性别：1男；2女；3未知',])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('user_bean_collect', ['id' => 'id', 'comment' => '生豆收藏表', 'engine' => 'InnoDB', '']);
        $table->addColumn('user_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '发布者id，user表id'])
            ->addColumn('bean_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '生豆Id，bean表id'])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();

        $table = $this->table('test', ['id' => 'id', 'comment' => '测试迁移', 'engine' => 'InnoDB', '']);
        $table->addColumn('user_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '发布者id，user表id'])
            ->addColumn('bean_id', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '生豆Id，bean表id'])
            ->addColumn('add_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '添加时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11, 'default' => '0', 'comment' => '更新时间'])
            ->create();


    }

    /**
     * 回滚删除表
     */
     public function down(){
        $this->table('admin')->drop();
        $this->table('admin_role')->drop();
        $this->table('banner')->drop();
        $this->table('bean')->drop();
        $this->table('bean_level')->drop();
        $this->table('bean_type')->drop();
        $this->table('config')->drop();
        $this->table('country')->drop();
        $this->table('cupping_test')->drop();
        $this->table('garden')->drop();
        $this->table('menu')->drop();
        $this->table('operate_log')->drop();
        $this->table('seeker')->drop();
        $this->table('seeker_level')->drop();
        $this->table('user')->drop();
        $this->table('user_bean_collect')->drop();
        $this->table('test')->drop();
    }
}
