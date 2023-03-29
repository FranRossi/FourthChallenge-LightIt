@props(['name'])
<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
    <a href="#" class="group inline-flex">
        {{ $name}}
        <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
        <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
        </span>
    </a>
</th>
