<?php
namespace App\Controllers;
use Config\Database;
class Student extends BaseController
{

public function index(){
    $db= Database::connect();
    $query=$db->query("select * from user");
    $studentList = $query->getResultArray();
    return View('student/index', ['data'=>$studentList]);
}

public function new(){
    // if(!$this->request->is('post'))
    return view('student/new');
}
// $data => $this->request->getpost();
// $student=[
//     'name'=>$data['name']
// ];
// $db=Database::connect();
// $db->table('student')->insert($student);
// return redirect()->to('/student')
public function edit(){
    try {
        $db = Database::connect();
        $id = $this->request->getGet('id');
        if(!$id) throw new \Exception("Id not provided for edit");
        $studentList = $db->query("Select * from user where id=".$id)->getRowObject();
        if(!$this->request->is('post')) return View('student/edit', ['user' => $studentList]);
        $data = $this->request->getPost();
        $db->table('user')->where('id', $id)->update($data);
        $this->_clientNotification->addSuccessMessage("Data updated successfully");
        return redirect()->to('/student');
    }
    catch (\Exception $e){
        var_dump($e);
        $this->_clientNotification->addErrorMessage($e->getMessage());
        return redirect()->to('/');
    }
}

public function delete(){
    try {
        $db = Database::connect();
        $id = $this->request->getGet('id');
        if(!$id) throw new \Exception("Id not provided for delete");
        $studentList = $db->query("Select * from user where id=".$id)->getRowObject();
        if(!$studentList) throw new \Exception("Invalid id provided for delete");
        $db->table('user')->where('id', $id)->delete();
        $this->_clientNotification->addSuccessMessage("data deleted successfully");
        return redirect()->to('/student');
    }
    catch (\Exception $e){
        var_dump($e);
        $this->_clientNotification->addErrorMessage($e->getMessage());
        return redirect()->to('/');
    }
}
}

?>