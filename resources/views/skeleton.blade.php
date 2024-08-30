<div class="w-7/12 space-y-4">
    <!-- 스켈레톤 아이템을 반복하여 로딩 중인 상태를 표시 -->
    @for ($i = 0; $i < 5; $i++)
        <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl animate-pulse">
            <div class="flex flex-col justify-between p-4 leading-normal flex-grow">
                <div class="flex justify-between mb-4">
                    <div class="w-1/2 h-6 bg-gray-300 rounded"></div>
                    <div class="px-2 py-1 border border-slate-200 rounded-md bg-gray-200 w-1/4 h-4"></div>
                </div>
                <div class="w-full h-4 bg-gray-200 rounded mb-3"></div>
                <div class="w-full h-4 bg-gray-200 rounded mb-3"></div>
                <div class="w-full h-4 bg-gray-200 rounded mb-3"></div>
            </div>
        </div>
    @endfor
</div>