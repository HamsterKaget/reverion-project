@extends('frontend.layouts.app')

@section('seo')
    <title>Test DnAccount Connection - Dragon Nest</title>
    <meta name="description" content="Test connection and read data from DnAccount table">
@endsection

@section('body')
    <!-- Test Section -->
    <section class="section-animate relative min-h-screen py-16 lg:py-20 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <div class="hero-bg-slide hero-bg-slide-active" style="background-image: url('{{ asset('assets/bg-1.jpeg') }}');"></div>
        </div>

        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/80 z-10"></div>

        <!-- Red Accent Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-red-950/20 via-transparent to-black/40 z-10"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(220,38,38,0.15),transparent_70%)] z-10"></div>

        <!-- Content Container -->
        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">DnAccount Connection Test</h1>
                <p class="text-gray-300">Testing koneksi ke database Dragon Nest (dnmembership)</p>
            </div>

            <!-- Error Alert -->
            @if(isset($error))
                <div class="mb-6 p-4 bg-red-900/50 border border-red-700 rounded-lg">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-red-200 font-semibold">Connection Error</span>
                    </div>
                    <p class="text-red-300 mt-2">{{ $error }}</p>
                </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Accounts -->
                <div class="bg-gray-800/60 backdrop-blur-sm border border-gray-700 rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Total Accounts</p>
                            <p class="text-3xl font-bold text-white">{{ number_format($totalAccounts ?? 0) }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Active Accounts -->
                <div class="bg-gray-800/60 backdrop-blur-sm border border-gray-700 rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Active Accounts</p>
                            <p class="text-3xl font-bold text-green-400">{{ number_format($activeAccounts ?? 0) }}</p>
                        </div>
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Connection Status -->
                <div class="bg-gray-800/60 backdrop-blur-sm border border-gray-700 rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Connection Status</p>
                            <p class="text-3xl font-bold {{ isset($error) ? 'text-red-400' : 'text-green-400' }}">
                                {{ isset($error) ? 'Failed' : 'Success' }}
                            </p>
                        </div>
                        <div class="w-12 h-12 {{ isset($error) ? 'bg-red-500/20' : 'bg-green-500/20' }} rounded-lg flex items-center justify-center">
                            @if(isset($error))
                                <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            @else
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-gray-800/60 backdrop-blur-sm border border-gray-700 rounded-lg overflow-hidden">
                <div class="p-6 border-b border-gray-700">
                    <h2 class="text-2xl font-bold text-white">Accounts Data</h2>
                    <p class="text-gray-400 text-sm mt-1">Menampilkan {{ $accounts->count() }} dari {{ number_format($totalAccounts ?? 0) }} accounts</p>
                </div>

                @if($accounts->count() > 0)
                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-900/50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Account ID</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Account Name</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Level</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Character Limit</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Register Date</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach($accounts as $account)
                                    <tr class="hover:bg-gray-700/30 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="text-white font-mono text-sm">#{{ $account->AccountID }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-white font-medium">{{ $account->AccountName ?? '-' }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-500/20 text-blue-300">
                                                Level {{ $account->AccountLevelCode ?? 0 }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-gray-300">
                                                {{ $account->CharacterMaxCount ?? 0 }} / {{ $account->CharacterCreateLimit ?? 0 }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-gray-300 text-sm">
                                                {{ $account->RegisterDate ? $account->RegisterDate->format('Y-m-d H:i') : '-' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if(($account->LockFlag ?? 1) == 0)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-300">
                                                    Active
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500/20 text-red-300">
                                                    Locked
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($accounts->hasPages())
                        <div class="px-6 py-4 border-t border-gray-700">
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-400">
                                    Menampilkan {{ $accounts->firstItem() }} - {{ $accounts->lastItem() }} dari {{ $accounts->total() }} results
                                </div>
                                <div class="flex gap-2">
                                    @if($accounts->onFirstPage())
                                        <span class="px-4 py-2 bg-gray-700/50 text-gray-500 rounded-lg cursor-not-allowed">Previous</span>
                                    @else
                                        <a href="{{ $accounts->previousPageUrl() }}" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">Previous</a>
                                    @endif

                                    @if($accounts->hasMorePages())
                                        <a href="{{ $accounts->nextPageUrl() }}" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">Next</a>
                                    @else
                                        <span class="px-4 py-2 bg-gray-700/50 text-gray-500 rounded-lg cursor-not-allowed">Next</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="p-12 text-center">
                        <svg class="w-16 h-16 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p class="text-gray-400 text-lg">No data found</p>
                    </div>
                @endif
            </div>

            <!-- Back Button -->
            <div class="mt-8">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-300 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Back to Home</span>
                </a>
            </div>
        </div>
    </section>
@endsection
