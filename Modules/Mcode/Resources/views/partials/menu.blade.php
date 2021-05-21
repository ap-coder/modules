
                {{-- @can('mcode_manager_access') --}}
                    <li class="bg-blue nav-item has-treeview {{ request()->is("admin/mcode-features*") ? "menu-open" : "" }} {{ request()->is("admin/mcode-categories*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-qrcode">

                            </i>
                            <p>
                                {{ trans('cruds.mcodeManager.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
{{--                            @can('mcode_feature_access')--}}
                                <li class="nav-item">
                                    <a href="{{ route("admin.mcode-features.index") }}" class="nav-link {{ request()->is("admin/mcode-features") || request()->is("admin/mcode-features/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-qrcode">

                                        </i>
                                        <p>
                                            {{ trans('cruds.mcodeFeature.title') }}
                                        </p>
                                    </a>
                                </li>
{{--                            @endcan--}}
{{--                            @can('mcode_category_access')--}}
                                <li class="nav-item">
                                    <a href="{{ route("admin.mcode-categories.index") }}" class="nav-link {{ request()->is("admin/mcode-categories") || request()->is("admin/mcode-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-qrcode">

                                        </i>
                                        <p>
                                            {{ trans('cruds.mcodeCategory.title') }}
                                        </p>
                                    </a>
                                </li>
{{--                            @endcan--}}
                        </ul>
                    </li>
                {{-- @endcan --}}
{{--                @can('mcode_manager_access')--}}
                    <li class="nav-item has-treeview {{ request()->is("admin/mcode-features*") ? "menu-open" : "" }} {{ request()->is("admin/m-code-categories*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-qrcode">

                            </i>
                            <p>
                                {{ trans('cruds.mcodeManager.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
{{--                            @can('mcode_feature_access')--}}
                                <li class="nav-item">
                                    <a href="{{ route("admin.mcode-features.index") }}" class="nav-link {{ request()->is("admin/mcode-features") || request()->is("admin/mcode-features/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-qrcode">

                                        </i>
                                        <p>
                                            {{ trans('cruds.mcodeFeature.title') }}
                                        </p>
                                    </a>
                                </li>
{{--                            @endcan--}}
{{--                            @can('m_code_category_access')--}}
{{--                                <li class="nav-item">--}}
                                    <a href="{{ route("admin.m-code-categories.index") }}" class="nav-link {{ request()->is("admin/m-code-categories") || request()->is("admin/m-code-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.mCodeCategory.title') }}
                                        </p>
                                    </a>
                                </li>
{{--                            @endcan--}}
                        </ul>
                    </li>
{{--                @endcan--}}

                        </ul>
                    </li>
                @endcan
