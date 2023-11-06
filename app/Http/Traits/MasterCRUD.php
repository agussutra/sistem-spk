<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;

trait MasterCRUD {

    protected $view_path;
    protected $model;
    protected $validation_rule;
    protected $validation_rule_messages;
    protected $title;
    protected $primary_key;

    protected function setViewFolder(string $dir = null) {
        if($dir)
            $this->view_path = $dir;
        else
            $this->view_path = '';
    }

    protected function setModel($model) {
        $this->model = new $model();
    }

    protected function setValidationRule(array $rule) {
        $this->validation_rule = $rule ?? [];
    }

    protected function setValidationRuleMassage(array $message) {
        $this->validation_rule_messages = $message ?? [];
    }

    protected function setTitle(string $title) {
        $this->title = $title ?? 'Model';
    }

    protected function setPrimaryKey($key = null) {
        $this->primary_key = $key ?? $this->model->getPrimayKey();
    }

    public function index() {
        // query all data
        $data = $this->model::all();
        return view($this->view_path . '.index', compact('data'));
    }

    public function create() { return view($this->view_path . '.create'); }

    public function edit($id) { 
        
        $data = $this->model->where($this->primary_key, $id)->first();

        return view($this->view_path . '.update', compact('data')); 
    }

    public function store(Request $request) {
        
        $rules = isset($this->validation_rule['CREATE']) ? $this->validation_rule['CREATE']: $this->validation_rule;
        $messages = isset($this->validation_rule_messages['CREATE']) ? $this->validation_rule_messages['CREATE']: $this->validation_rule_messages;
        
        if(empty($rules) == false){
            $validation = validator($request->all(), $rules, $messages);
            
            if($validation->fails())
                return redirect()->back()->with('error', $validation->errors()->first());
        }

        try {
            $this->model::create($request->all());
            return redirect()->back()->with('success', "Data {$this->title} berhasil dibuat");
        }catch(\Exception $ex) {
            return redirect()->back()->with('error', "Data {$this->title} gagal dibuat");
        }


    }

    public function update(Request $request, $id) {
        
        $rules = isset($this->validation_rule['UPDATE']) ? $this->validation_rule['UPDATE']: $this->validation_rule;
        $messages = isset($this->validation_rule_messages['UPDATE']) ? $this->validation_rule_messages['UPDATE']: $this->validation_rule_messages;
        
        if(empty($rules) == false){
            $validation = validator($request->all(), $rules, $messages);
            
            if($validation->fails())
                return redirect()->back()->with('error', $validation->errors()->first());
        }

        try {

            $this->model->where($this->primary_key, $id)->update($request->all());

            return redirect()->back()->with('success', "Data {$this->title} berhasil diubah");
        }catch(\Exception $ex) {
            return redirect()->back()->with('error', "Data {$this->title} gagal diubah");
        }


    }

    public function destroy($id) {
        try {

            $this->model->where($this->primary_key, $id)->delete();

            return redirect()->back()->with('success', "Data {$this->title} berhasil dihapus");
        }catch(\Exception $ex) {
            return redirect()->back()->with('error', "Data {$this->title} gagal dihapus");
        }
    }

}