@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="bg-gradient-to-r from-blue-700 to-blue-500 text-white rounded-2xl shadow-xl p-8 mb-10 relative overflow-hidden">
    <div class="relative z-10">
        <h1 class="text-4xl font-bold mb-3 tracking-tight">Dashboard</h1>
        <p class="text-blue-50 text-lg opacity-90">Quick snapshot of your application activity.</p>
    </div>
    <div class="absolute right-0 top-0 bottom-0 opacity-10 flex items-center p-8 pointer-events-none">
        <i class="fas fa-chart-pie text-[160px] -rotate-12 translate-x-12 translate-y-4"></i>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
    <!-- Stat Cards -->
    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-6">
            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center border border-blue-100/50 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                <i class="fas fa-user-shield text-2xl"></i>
            </div>
            <div class="text-blue-500 bg-blue-50 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Admins</div>
        </div>
        <div>
            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Total Staff</p>
            <h3 class="text-4xl font-bold text-gray-900">{{ \App\Models\Admin::count() }}</h3>
        </div>
    </div>

    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-6">
            <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center border border-indigo-100/50 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                <i class="fas fa-tags text-2xl"></i>
            </div>
            <div class="text-indigo-500 bg-indigo-50 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Access</div>
        </div>
        <div>
            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Total Roles</p>
            <h3 class="text-4xl font-bold text-gray-900">{{ \App\Models\Acl\Role::count() }}</h3>
        </div>
    </div>

    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-6">
            <div class="w-14 h-14 bg-violet-50 text-violet-600 rounded-2xl flex items-center justify-center border border-violet-100/50 group-hover:bg-violet-600 group-hover:text-white transition-colors duration-300">
                <i class="fas fa-cubes text-2xl"></i>
            </div>
            <div class="text-violet-500 bg-violet-50 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Modules</div>
        </div>
        <div>
            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Active Modules</p>
            <h3 class="text-4xl font-bold text-gray-900">{{ \App\Models\Acl\Module::count() }}</h3>
        </div>
    </div>

    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-6">
            <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center border border-emerald-100/50 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                <i class="fas fa-server text-2xl"></i>
            </div>
            <div class="text-emerald-500 bg-emerald-50 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Status</div>
        </div>
        <div>
            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">System Health</p>
            <h3 class="text-4xl font-bold text-emerald-600">Active</h3>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Recent Activity Table -->
    <div class="lg:col-span-2 bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h2 class="text-xl font-bold text-gray-900">Recent User Management</h2>
            <a href="{{ route('admin.acl.users') }}" class="text-blue-600 text-sm font-bold hover:text-blue-700 transition-colors">View All <i class="fas fa-arrow-right ml-1"></i></a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-white">
                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Admin Name</th>
                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Email Address</th>
                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach(\App\Models\Admin::latest()->take(5)->get() as $activityAdmin)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">
                                    {{ substr($activityAdmin->name, 0, 1) }}
                                </div>
                                <span class="font-bold text-gray-700">{{ $activityAdmin->name }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-gray-500 font-medium text-sm">{{ $activityAdmin->email }}</td>
                        <td class="px-8 py-5 text-center">
                            <a href="{{ route('admin.acl.users.edit', $activityAdmin->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-100 text-gray-400 hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                                <i class="fas fa-edit text-xs"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Actions Panel -->
    <div class="space-y-8">
        <div class="bg-[#0A2647] rounded-3xl p-8 text-white relative overflow-hidden shadow-2xl">
            <h2 class="text-xl font-bold mb-6 relative z-10 flex items-center gap-2">
                <i class="fas fa-bolt text-yellow-400"></i> Quick Actions
            </h2>
            <div class="grid grid-cols-2 gap-4 relative z-10">
                <a href="{{ route('admin.acl.users.add') }}" class="flex flex-col items-center gap-3 p-4 bg-white/10 rounded-2xl border border-white/10 hover:bg-white/20 transition-all group">
                    <i class="fas fa-user-plus text-xl group-hover:scale-110 transition-transform"></i>
                    <span class="text-[10px] font-bold uppercase tracking-wider">Add User</span>
                </a>
                <a href="{{ route('admin.acl.roles') }}" class="flex flex-col items-center gap-3 p-4 bg-white/10 rounded-2xl border border-white/10 hover:bg-white/20 transition-all group">
                    <i class="fas fa-user-tag text-xl group-hover:scale-110 transition-transform"></i>
                    <span class="text-[10px] font-bold uppercase tracking-wider">New Role</span>
                </a>
                <a href="{{ route('admin.acl.modules') }}" class="flex flex-col items-center gap-3 p-4 bg-white/10 rounded-2xl border border-white/10 hover:bg-white/20 transition-all group">
                    <i class="fas fa-plus-square text-xl group-hover:scale-110 transition-transform"></i>
                    <span class="text-[10px] font-bold uppercase tracking-wider">New Module</span>
                </a>
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('dash-logout').submit();" class="flex flex-col items-center gap-3 p-4 bg-red-500/20 rounded-2xl border border-red-500/20 hover:bg-red-500 transition-all group">
                    <i class="fas fa-power-off text-xl group-hover:scale-110 transition-transform"></i>
                    <span class="text-[10px] font-bold uppercase tracking-wider">Logout</span>
                </a>
                <form id="dash-logout" action="{{ route('admin.logout') }}" method="POST" class="hidden">@csrf</form>
            </div>
            <div class="absolute -right-8 -bottom-8 opacity-10">
                <i class="fas fa-rocket text-[120px] rotate-45"></i>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
            <h2 class="text-lg font-bold text-gray-900 mb-6">System Health</h2>
            <div class="space-y-6">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-bold text-gray-500">Database Connection</span>
                        <span class="text-[10px] font-black text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full uppercase tracking-widest">Active</span>
                    </div>
                    <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full transition-all duration-1000" style="width: 100%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-bold text-gray-500">Storage Usage</span>
                        <span class="text-[10px] font-black text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full uppercase tracking-widest">32% Used</span>
                    </div>
                    <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-amber-500 h-full transition-all duration-1000" style="width: 32%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
