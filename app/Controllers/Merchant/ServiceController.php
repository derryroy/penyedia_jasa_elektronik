<?php

namespace App\Controllers\Merchant;

use App\Models\Category;
use App\Models\Service;
use CodeIgniter\RESTful\ResourceController;

class ServiceController extends ResourceController
{
    protected $service, $category;

    public function __construct()
    {
        $this->service = new Service();
        $this->category = new Category();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $userID = session()->get('user')['user_id'];
        return view('merchant/services/index', [
            'services' => $this->service->where('user_id', $userID)->joinCategory()->orderBy('created_at', 'desc')->findAll(),
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('merchant/services/form', [
            'categories' => $this->category->findAll(),
            'validation' => \Config\Services::validation(),
        ]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $validation = \Config\Services::validation();

        $validate = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'estimated_price' => 'required|integer|greater_than_equal_to[10000]',
            'image' => 'uploaded[image]',
            'category_id' => 'required',
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $slug = url_title($this->request->getVar('title'), '-', true);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $slug .= '-';
        $slug .= $randomString;


        if ($image = $this->request->getFile('image')) {
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();

                $image->move(ROOTPATH . 'public/uploads', $imageName);

                $user = session()->get('user');

                $this->service->save([
                    'title' => $this->request->getVar('title'),
                    'slug' => $slug,
                    'description' => $this->request->getVar('description'),
                    'estimated_price' => $this->request->getVar('estimated_price'),
                    'image' => @$imageName ?? '',
                    'category_id' => $this->request->getVar('category_id'),
                    'user_id' => $user['user_id'],
                ]);

                return redirect()->to('/merchant/services')->with('success', 'Data Berhasil Disimpan');
            }
        }

        return redirect()->back()->withInput()->with('error', 'Image not uploaded');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        return view('merchant/services/form', [
            'categories' => $this->category->findAll(),
            'service' => $this->service->find($id),
            'validation' => \Config\Services::validation(),
        ]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $validation = \Config\Services::validation();

        $validate = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'estimated_price' => 'required|integer|greater_than_equal_to[10000]',
            'image' => 'permit_empty|uploaded[image]',
            'category_id' => 'required',
        ]);

        if (!$validate) return redirect()->back()->withInput();

        $service = $this->service->find($id);

        $slug = $service['slug'];

        if ($service['title'] != $this->request->getVar('title')) {
            $slug = url_title($this->request->getVar('title'), '-', true);
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 6; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $slug .= '-';
            $slug .= $randomString;
        }

        $imageName = null;

        if ($image = $this->request->getFile('image')) {
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();

                $image->move(ROOTPATH . 'public/uploads', $imageName);

            }
        }

        $user = session()->get('user');

        $payload = [
            'service_id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'description' => $this->request->getVar('description'),
            'estimated_price' => $this->request->getVar('estimated_price'),
            'category_id' => $this->request->getVar('category_id'),
            'user_id' => $user['user_id'],
        ];

        if ($imageName) $payload['image'] = $imageName;

        $this->service->save($payload);

        return redirect()->to('/merchant/services')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if (!$this->service->delete($id)) return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus');

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
