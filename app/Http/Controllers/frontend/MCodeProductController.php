<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMCodeProductRequest;
use App\Http\Requests\StoreMCodeProductRequest;
use App\Http\Requests\UpdateMCodeProductRequest;
use App\Models\MCodeProduct;
use App\Models\Product;
use App\Models\ProductModel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MCodeProductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('m_code_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mCodeProducts = MCodeProduct::with(['product', 'model'])->get();

        return view('frontend.mCodeProducts.index', compact('mCodeProducts'));
    }

    public function create()
    {
        abort_if(Gate::denies('m_code_product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $models = ProductModel::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.mCodeProducts.create', compact('products', 'models'));
    }

    public function store(StoreMCodeProductRequest $request)
    {
        $mCodeProduct = MCodeProduct::create($request->all());

        return redirect()->route('frontend.m-code-products.index');
    }

    public function edit(MCodeProduct $mCodeProduct)
    {
        abort_if(Gate::denies('m_code_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $models = ProductModel::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mCodeProduct->load('product', 'model');

        return view('frontend.mCodeProducts.edit', compact('products', 'models', 'mCodeProduct'));
    }

    public function update(UpdateMCodeProductRequest $request, MCodeProduct $mCodeProduct)
    {
        $mCodeProduct->update($request->all());

        return redirect()->route('frontend.m-code-products.index');
    }

    public function show(MCodeProduct $mCodeProduct)
    {
        abort_if(Gate::denies('m_code_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mCodeProduct->load('product', 'model');

        return view('frontend.mCodeProducts.show', compact('mCodeProduct'));
    }

    public function destroy(MCodeProduct $mCodeProduct)
    {
        abort_if(Gate::denies('m_code_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mCodeProduct->delete();

        return back();
    }

    public function massDestroy(MassDestroyMCodeProductRequest $request)
    {
        MCodeProduct::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
