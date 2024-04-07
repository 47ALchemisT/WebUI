<?php

$conn= new mysqli("localhost", "root", "","spis") or die("Couldn't connect");

?>
<div id="venueContainer" class="grid grid-cols-3 gap-5 items-center justify-center">
                                    <div class="max-w-sm bg-white w-full border-2 p-6 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col  hover:border-blue-500  transition-transform transform-gpu hover:scale-105">
                                        <div class="relative overflow-x-auto">
                                            <div class="flex justify-between">
                                                <h1 class="text-lg text-gray-800 font-bold mb-4">Major</h1>
                                                <div>
                                                    <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-blue-500/10 hover:text-blue-600 active:bg-blue-500/30 dark:bg-gray-800 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                                                        <span class="sr-only">Open dropdown</span>
                                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                                        </svg>
                                                    </button>                                   
                                                    <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-md border-2 border-gray-200 w-32 dark:bg-gray-700">
                                                        <ul class="p-2" aria-labelledby="dropdownButton">
                                                            <li>
                                                                <button data-modal-target="crud-modal-update" data-modal-toggle="crud-modal-update" data-tooltip-target="tooltip-light" data-tooltip-style="light" type="button" class="block px-4 py-2 mb-2 bg-blue-50 font-medium text-sm w-full text-left rounded-md text-blue-500 hover:bg-blue-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i class="fa-solid fa-file-pen mr-2"></i>Edit</button>
                                                            </li>
                                                            <li>
                                                                <a href="" class="block px-4 rounded-md py-2 text-sm font-medium text-red-500 bg-red-50  hover:bg-red-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i class="fa-solid fa-trash-can mr-2"></i>Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead class="text-xs text-gray-900 uppercase dark:text-gray-400 text-center">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            Rank
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Points
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="bg-white dark:bg-gray-800 text-center">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <i class="fa-solid fa-trophy text-yellow-400 mr-2"></i>1st
                                                        </th>
                                                        <td class="px-6 py-4 font-medium">
                                                            50
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-white dark:bg-gray-800 text-center">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <i class="fa-solid fa-trophy text-gray-400 mr-2"></i>2nd
                                                        </th>
                                                        <td class="px-6 py-4 font-medium">
                                                            45
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-white dark:bg-gray-800 text-center">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <i class="fa-solid fa-trophy mr-2 text-yellow-800"></i>3rd
                                                        </th>
                                                        <td class="px-6 py-4 font-medium">
                                                            40
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-white dark:bg-gray-800 text-center">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <i class="fa-solid fa-medal mr-2 text-yellow-700"></i>4th
                                                        </th>
                                                        <td class="px-6 py-4 font-medium">
                                                            35
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-white dark:bg-gray-800 text-center">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <i class="fa-solid fa-medal mr-2 text-yellow-700"></i>5th
                                                        </th>
                                                        <td class="px-6 py-4 font-medium">
                                                            30
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-white dark:bg-gray-800 text-center">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <i class="fa-solid fa-medal mr-2 text-yellow-700"></i>6th
                                                        </th>
                                                        <td class="px-6 py-4 font-medium">
                                                            25
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>