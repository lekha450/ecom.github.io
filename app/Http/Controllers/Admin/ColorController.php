<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $result['data'] = Color::all();
        
        return view('Admin/color', $result);
        
    }

  
    public function manage_color(Request $request, $id='')
    {
        if($id>0){
            $arr = Color::where(['id' => $id])->get();

            $result['color'] = $arr['0']->color;
            // $result['size'] = $arr['0']->size;
            $result['status'] = $arr['0']->status;
            // $result['value'] = $arr['0']->value;
            $result['id'] = $arr['0']->id;
        }else{
            $result['color'] = '';
            // $result['size'] = '';
            $result['status'] = '';
            // $result['value'] = '';
            $result['id'] = 0;
        }
       
        return view('Admin/manage_color', $result);
    }
    public function manage_color_process(Request $request)
    {
        // return $request->post();
        $request->validate([
            
            'color' => 'required|unique:colors,color,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $model =Color::find($request->post('id'));
            $msg = "Color updated";
        }else{
            
            $model = new Color();
            $msg = "Color inserted";
        }

        $model->color = $request->post('color');
        // $model->size = $request->post('size');
        $model->status = 1;
        $model->save();
        $request->session()->flash('message', $msg);
        return redirect('admin/color');
    }

    public function delete(Request $request, $id)
    {
        $model = Color::find($id);
        $model->delete();
        $request->session()->flash('message', 'Color deleted');
        return redirect('admin/color');
    }
    public function status(Request $request, $status, $id)
    {
        $model = Color::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message', 'Color status updated');
        return redirect('admin/color');
      
    }
}
