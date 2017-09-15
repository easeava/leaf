<?php

namespace Gayly\Leaf\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Gayly\Leaf\Layout\Column;
use Gayly\Leaf\Layout\Content;
use Gayly\Leaf\Layout\Row;
use Gayly\Leaf\Grid;
use Leaf;
use Illuminate\Database\Eloquent\Model;
use Gayly\Leaf\Auth\Models\LeafUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(\Gayly\Leaf\Auth\Models\LeafUser $user)
    {
        return Leaf::content(function (Content $content) {
			$content->header('用户列表');
            $content->setBeforeBuild('<div class="no-padding container-fixed-lg bg-white"><div class="container">');
            $content->setAfterBuild('</div></div>');
			$content->row($this->grid());
		});
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

	protected function grid()
	{
		return Leaf::grid(LeafUser::class, function (Grid $grid) {
            $grid->id('ID');
			$grid->name('昵称');
            $grid->email('邮箱');
            $grid->mobile('手机');
            $grid->wechat('微信');
            $grid->qq('QQ');

        });
	}
}
