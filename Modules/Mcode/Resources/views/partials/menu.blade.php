                @can('mcode_manager_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/mcodes*") ? "menu-open" : "" }} {{ request()->is("admin/mcode-categories*") ? "menu-open" : "" }} {{ request()->is("admin/mcode-features*") ? "menu-open" : "" }} {{ request()->is("admin/mcode-product-models*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-qrcode">

                            </i>
                            <p>
                                {{ trans('mcode::cruds.mcodeManager.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('mcode_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.mcodes.index") }}" class="nav-link {{ request()->is("admin/mcodes") || request()->is("admin/mcodes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-qrcode">

                                        </i>
                                        <p>
                                            {{ trans('mcode::cruds.mcode.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('mcode_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.mcode-categories.index") }}" class="nav-link {{ request()->is("admin/mcode-categories") || request()->is("admin/mcode-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-qrcode">

                                        </i>
                                        <p>
                                            {{ trans('mcode::cruds.mcodeCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('mcode_feature_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.mcode-features.index") }}" class="nav-link {{ request()->is("admin/mcode-features") || request()->is("admin/mcode-features/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-qrcode">

                                        </i>
                                        <p>
                                            {{ trans('mcode::cruds.mcodeFeature.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('mcode_product_model_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.mcode-product-models.index") }}" class="nav-link {{ request()->is("admin/mcode-product-models") || request()->is("admin/mcode-product-models/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-keyboard">

                                        </i>
                                        <p>
                                            {{ trans('mcode::cruds.mcodeProductModel.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
