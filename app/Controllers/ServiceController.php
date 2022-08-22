<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Service;

class ServiceController extends BaseController
{
    protected $service, $category;

    public function __construct()
    {
        $this->service = new Service();
        $this->category = new Category();
    }

    public function index($category = null)
    {
        $search = $this->request->getGet('search');
        return view('services/index', [
            'services' => $this->service
                ->search($search)
                ->whereCategory($category)
                ->joinMerchant()
                ->joinCategory()
                ->orderBy('services.created_at', 'desc')->findAll(),
            'categories' => $this->category->findAll(),
            'selectedCategory' => $category,
            'search' => $search,
        ]);
    }

    public function show($category, $slug)
    {
        $service = $this->service->whereSlug($slug)->joinMerchant()->joinCategory()->first();

        if (!$service)
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        return view('services/show', [
            'service' => $service,
            'validation' => \Config\Services::validation(),
        ]);
    }
}
