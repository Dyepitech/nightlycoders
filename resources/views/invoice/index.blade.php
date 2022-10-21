<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @section('title') {{ config('app.name') }} @show
    </title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link
    rel="shortcut icon"
    href="assets/images/favicon.svg"
    type="image/x-icon"
  />


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<div class="antialiased sans-serif min-h-screen bg-white" style="min-height: 900px">
	<style>
		[x-cloak] {
			display: none;
		}

		@media print {
			.no-printme  {
				display: none;
			}
			.printme  {
				display: block;
			}
			body {
				line-height: 1.2;
			}
		}

		@page {
			size: A4 portrait;
			counter-increment: page;
		}

		/* Datepicker */
		.date-input {
			background-color: #fff;
			border-radius: 10px;
			padding: 0.5rem 1rem;
			z-index: 2000;
			margin: 3px 0 0 0;
			border-top: 1px solid #eee;
			box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
				0 4px 6px -2px rgba(0, 0, 0, 0.05);
		}
		.date-input.is-hidden {
			display: none;
		}
		.date-input .pika-title {
			padding: 0.5rem;
			width: 100%;
			text-align: center;
		}
		.date-input .pika-prev,
		.date-input .pika-next {
			margin-top: 0;
			/* margin-top: 0.5rem; */
			padding: 0.2rem 0;
			cursor: pointer;
			color: #4299e1;
			text-transform: uppercase;
			font-size: 0.85rem;
		}
		.date-input .pika-prev:hover,
		.date-input .pika-next:hover {
			text-decoration: underline;
		}
		.date-input .pika-prev {
			float: left;
		}
		.date-input .pika-next {
			float: right;
		}
		.date-input .pika-label {
			display: inline-block;
			font-size: 0;
		}
		.date-input .pika-select-month,
		.date-input .pika-select-year {
			display: inline-block;
			border: 1px solid #ddd;
			color: #444;
			background-color: #fff;
			border-radius: 10px;
			font-size: 0.9rem;
			padding-left: 0.5em;
			padding-right: 2.5em;
			padding-top: 0.25em;
			padding-bottom: 0.25em;
			appearance: none;
		}
		.date-input .pika-select-month:focus,
		.date-input .pika-select-year:focus {
			border-color: #cbd5e0;
			outline: none;
		}
		.date-input .pika-select-month {
			margin-right: 0.25em;
		}
		.date-input table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 0.2rem;
		}
		.date-input table th {
			width: 2em;
			height: 2em;
			font-weight: normal;
			color: #718096;
			text-align: center;
		}
		.date-input table th abbr {
			text-decoration: none;
		}
		.date-input table td {
			padding: 2px;
		}
		.date-input table td button {
			/* border: 1px solid #e2e8f0; */
			width: 1.8em;
			height: 1.8em;
			text-align: center;
			color: #555;
			border-radius: 10px;
		}
		.date-input table td button:hover {
			background-color: #bee3f8;
		}
		.date-input table td.is-today button {
			background-color: #ebf8ff;
		}
		.date-input table td.is-selected button {
			background-color: #3182ce;
		}
		.date-input table td.is-selected button {
			color: white;
		}
		.date-input table td.is-selected button:hover {
			color: white;
		}
	</style>

	<div class="border-t-8 border-gray-700 h-2"></div>
	<div 
		class="container mx-auto py-6 px-4"
		x-data="invoices()"
		x-init="generateInvoiceNumber(111111, 999999);"
		x-cloak
	>
		<div class="flex justify-between">
            {{-- <h2 class="text-2xl font-bold mb-6 pb-2 tracking-wider uppercase">Devini Team</h2> --}}
            <img class="w-25 h-25" src="http://image.noelshack.com/fichiers/2022/42/2/1666080979-deviniteam.png" >
			<div>
				<div class="relative mr-4 inline-block">
					<div class="text-gray-500 cursor-pointer w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-300 inline-flex items-center justify-center" @mouseenter="showTooltip = true" @mouseleave="showTooltip = false" @click="printInvoice()">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<rect x="0" y="0" width="24" height="24" stroke="none"></rect>
							<path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
							<path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
							<rect x="7" y="13" width="10" height="8" rx="2" />
						</svg>				  
					</div>
					<div x-show.transition="showTooltip" class="z-40 shadow-lg text-center w-32 block absolute right-0 top-0 p-2 mt-12 rounded-lg bg-gray-800 text-white text-xs">
						Imprimer ce devis
					</div>
				</div>
				
				<div class="relative inline-block">
					<div class="text-gray-500 cursor-pointer w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-300 inline-flex items-center justify-center" @mouseenter="showTooltip2 = true" @mouseleave="showTooltip2 = false" @click="window.location.reload()">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<rect x="0" y="0" width="24" height="24" stroke="none"></rect>
							<path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -5v5h5" />
							<path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 5v-5h-5" />
						</svg>	  
					</div>
					<div x-show.transition="showTooltip2" class="z-40 shadow-lg text-center w-32 block absolute right-0 top-0 p-2 mt-12 rounded-lg bg-gray-800 text-white text-xs">
						Recharger la page
					</div>
				</div>
			</div>
		</div>

		<div class="flex mb-8 justify-between">
			<div class="w-2/4">
				<div class="mb-2 md:mb-1 md:flex items-center">
					<label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Devis No.</label>
					<span class="mr-4 inline-block hidden md:block">:</span>
					<div class="flex-1">
					<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-48 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="eg. #INV-100001" x-model="invoiceNumber">
					</div>
				</div>

				<div class="mb-2 md:mb-1 md:flex items-center">
					<label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Date du devis</label>
					<span class="mr-4 inline-block hidden md:block">:</span>
					<div class="flex-1">
					<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-48 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 js-datepicker" type="text" id="datepicker1" placeholder="eg. 17 Feb, 2020" x-model="invoiceDate" x-on:change="invoiceDate = document.getElementById('datepicker1').value" autocomplete="off" readonly>
					</div>
				</div>

				<div class="mb-2 md:mb-1 md:flex items-center">
					<label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Echéance</label>
					<span class="mr-4 inline-block hidden md:block">:</span>
					<div class="flex-1">
					<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-48 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 js-datepicker-2" id="datepicker2" type="text" placeholder="eg. 17 Mar, 2020" x-model="invoiceDueDate" x-on:change="invoiceDueDate = document.getElementById('datepicker2').value" autocomplete="off" readonly>
					</div>
				</div>
			</div>
			<div>
				<div class="w-32 h-32 mb-1 border rounded-lg overflow-hidden relative bg-gray-100">
					<img id="image" class="object-cover w-full h-32" src="https://placehold.co/300x300/e2e8f0/e2e8f0" />
					
					<div class="absolute top-0 left-0 right-0 bottom-0 w-full block cursor-pointer flex items-center justify-center" onClick="document.getElementById('fileInput').click()">
						<button type="button"
							style="background-color: rgba(255, 255, 255, 0.65)"
							class="hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 text-sm border border-gray-300 rounded-lg shadow-sm"
						>
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<rect x="0" y="0" width="24" height="24" stroke="none"></rect>
								<path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
								<circle cx="12" cy="13" r="3" />
							</svg>							  
						</button>
					</div>
				</div>
				<input name="photo" id="fileInput" accept="image/*" class="hidden" type="file" onChange="let file = this.files[0]; 
					var reader = new FileReader();

					reader.onload = function (e) {
						document.getElementById('image').src = e.target.result;
						document.getElementById('image2').src = e.target.result;
					};
				
					reader.readAsDataURL(file);
				">
			</div>
		</div>

		<div class="flex flex-wrap justify-between mb-8">
			<div class="w-full md:w-1/3 mb-2 md:mb-0">
				<label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">Facturé à:</label>
				<input class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="Billing company name" x-model="billing.name">
				<input class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="Billing company address" x-model="billing.address">
				<input class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="Additional info" x-model="billing.extra">
			</div>
			<div class="w-full md:w-1/3">
				<label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">Par:</label>
				<input class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="Your company name" x-model="from.name">

				<input class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="Your company address" x-model="from.address">

				<input class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="Additional info" x-model="from.extra">
			</div>
		</div>

		<div class="flex -mx-1 border-b py-2 items-start">
			<div class="flex-1 px-1">   
				<p class="text-gray-800 uppercase tracking-wide text-sm font-bold">Description</p>
			</div>

			<div class="px-1 w-20 text-right">
				<p class="text-gray-800 uppercase tracking-wide text-sm font-bold">Quantité</p>
			</div>

			<div class="px-1 w-32 text-right">
				<p class="leading-none">
					<span class="block uppercase tracking-wide text-sm font-bold text-gray-800">Prix Unitaire</span>
					<span class="font-medium text-xs text-gray-500">(Incl. TVA)</span>
				</p>
			</div>

			<div class="px-1 w-32 text-right">
				<p class="leading-none">
					<span class="block uppercase tracking-wide text-sm font-bold text-gray-800">Montant</span>
					<span class="font-medium text-xs text-gray-500">(Incl. TVA)</span>
				</p>
			</div>

			<div class="px-1 w-20 text-center">
			</div>
		</div>
	    <template x-for="invoice in items" :key="invoice.id">
			<div class="flex -mx-1 py-2 border-b">
				<div class="flex-1 px-1">
					<p class="text-gray-800" x-text="invoice.name"></p>
				</div>

				<div class="px-1 w-20 text-right">
					<p class="text-gray-800" x-text="invoice.qty"></p>
				</div>

				<div class="px-1 w-32 text-right">
					<p class="text-gray-800" x-text="numberFormat(invoice.rate)"></p>
				</div>

				<div class="px-1 w-32 text-right">
					<p class="text-gray-800" x-text="numberFormat(invoice.total + (invoice.TVA * invoice.qty))"></p>
				</div>

				<div class="px-1 w-20 text-right">
					<a href="#" class="text-red-500 hover:text-red-600 text-sm font-semibold" @click.prevent="deleteItem(invoice.id)">Delete</a>
				</div>
			</div>
		</template>

		<button class="mt-6 bg-white hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 text-sm border border-gray-300 rounded shadow-sm" x-on:click="openModal = !openModal">
			Ajouter des éléments
		</button>

		<div class="py-2 ml-auto mt-5 w-full sm:w-2/4 lg:w-1/4">
			<div class="flex justify-between mb-3">
				<div class="text-gray-800 text-right flex-1 mx-3">Total HT</div>
				<div class="text-right w-40">
					<div class="text-gray-800 font-medium" x-html="netTotal"></div>
				</div>
			</div>
			<div class="flex justify-between mb-4">
				<div class="text-sm text-gray-600 text-right flex-1 mx-3">TVA(20%) incl. in Total</div>
				<div class="text-right w-40">
					<div class="text-sm text-gray-600" x-html="totalTVA"></div>
				</div>
			</div>
		
			<div class="py-2 border-t border-b">
				<div class="flex justify-between">
					<div class="text-xl text-gray-600 text-right flex-1 mx-3">Montant Total</div>
					<div class="text-right w-40">
						<div class="text-xl text-gray-800 font-bold" x-html="netTotalTVA"></div>
					</div>
				</div>
			</div>
		</div>

		<div class="py-10 text-center">
			<p class="text-gray-600">Generated by NightlyCoders </p>
		</div>

		<!-- Print Template -->
		<div id="js-print-template" x-ref="printTemplate" class="hidden">
			<div class="mb-8 flex justify-between">
				<div>
					<img width="300px" src="http://image.noelshack.com/fichiers/2022/42/2/1666080979-deviniteam.png" >

					<div class="mb-1 flex items-center">
						<label class="w-32 text-gray-800 block font-bold text-xs uppercase tracking-wide">Facture No.</label>
						<span class="mr-4 inline-block">:</span>
						<div x-text="invoiceNumber"></div>
					</div>
		
					<div class="mb-1 flex items-center">
						<label class="w-32 text-gray-800 block font-bold text-xs uppercase tracking-wide">Date du devis</label>
						<span class="mr-4 inline-block">:</span>
						<div x-text="invoiceDate"></div>
					</div>
		
					<div class="mb-1 flex items-center">
						<label class="w-32 text-gray-800 block font-bold text-xs uppercase tracking-wide">Date d'échéance</label>
						<span class="mr-4 inline-block">:</span>
						<div x-text="invoiceDueDate"></div>
					</div>
				</div>
				<div class="pr-5">
					<div class="w-32 h-32 mb-1 overflow-hidden">
						<img id="image2" class="object-cover w-20 h-20" />
					</div>
				</div>
			</div>

			<div class="flex justify-between mb-10">
				<div class="w-1/2">
					<label class="text-gray-800 block mb-2 font-bold text-xs uppercase tracking-wide">Bill/Ship To:</label>
					<div>
						<div x-text="billing.name"></div>
						<div x-text="billing.address"></div>
						<div x-text="billing.extra"></div>
					</div>
				</div>
				<div class="w-1/2">
					<label class="text-gray-800 block mb-2 font-bold text-xs uppercase tracking-wide">From:</label>
					<div>
						<div x-text="from.name"></div>
						<div x-text="from.address"></div>
						<div x-text="from.extra"></div>
					</div>
				</div>
			</div>

			<div class="flex flex-wrap -mx-1 border-b py-2 items-start">
				<div class="flex-1 px-1">
					<p class="text-gray-600 uppercase tracking-wide text-xs font-bold">Description</p>
				</div>
	
				<div class="px-1 w-32 text-right">
					<p class="text-gray-600 uppercase tracking-wide text-xs font-bold">Quantité</p>
				</div>
	
				<div class="px-1 w-32 text-right">
					<p class="leading-none">
						<span class="block uppercase tracking-wide text-xs font-bold text-gray-600">Prix Unitaire</span>
						<span class="font-medium text-xs text-gray-500">(Incl. TVA)</span>
					</p>
				</div>
	
				<div class="px-1 w-32 text-right">
					<p class="leading-none">
						<span class="block uppercase tracking-wide text-xs font-bold text-gray-600">Montant</span>
						<span class="font-medium text-xs text-gray-500">(Incl. TVA)</span>
					</p>
				</div>
			</div>
			<template x-for="invoice in items" :key="invoice.id">
				<div class="flex flex-wrap -mx-1 py-2 border-b">
					<div class="flex-1 px-1">
						<p class="text-gray-800" x-text="invoice.name"></p>
					</div>
	
					<div class="px-1 w-32 text-right">
						<p class="text-gray-800" x-text="invoice.qty"></p>
					</div>
	
					<div class="px-1 w-32 text-right">
						<p class="text-gray-800" x-text="numberFormat(invoice.rate)"></p>
					</div>
	
					<div class="px-1 w-32 text-right">
						<p class="text-gray-800" x-text="numberFormat(invoice.total + (invoice.TVA * invoice.qty))"></p>
					</div>
				</div>
			</template>

			<div class="py-2 ml-auto mt-20" style="width: 320px">
				<div class="flex justify-between mb-3">
					<div class="text-gray-800 text-right flex-1 mx-3">Total HT</div>
					<div class="text-right w-40">
						<div class="text-gray-800 font-medium" x-html="netTotal"></div>
					</div>
				</div>
				<div class="flex justify-between mb-4">
					<div class="text-sm text-gray-600 text-right flex-1 mx-3">TVA(20%) incl. in Total</div>
					<div class="text-right w-40">
						<div class="text-sm text-gray-600" x-html="totalTVA"></div>
					</div>
				</div>
			
				<div class="py-2 border-t border-b">
					<div class="flex justify-between">
						<div class="text-xl text-gray-600 text-right flex-1 mx-3">Montant Total </div>
						<div class="text-right w-40">
							<div class="text-xl text-gray-800 font-bold" x-html="netTotalTVA"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- /Print Template -->
        
		<!-- Modal -->
		<div style=" background-color: rgba(0, 0, 0, 0.8)" class="fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="openModal">
			<div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-hidden mt-24">
				<div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
					x-on:click="openModal = !openModal">
					<svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
						<path
							d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
					</svg>
				</div>

				<div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">
					
					<h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Selectionnez un service</h2>
				 
					<div class="mb-4">
						<label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">Description</label>
                        <select class="text-gray-700 block appearance-none w-full bg-gray-200 border-2 border-gray-200 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500" x-model="item.name">
                            <option value="Site Vitrine">Site Vitrine</option>
                            <option value="Site Ecommerce">Site Ecommerce</option>
                        </select>
					</div>

					<div class="flex">
						<div class="mb-4 w-32 mr-2">
							<label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">Quantité</label>
							<input class="text-right mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" x-model="item.qty">
						</div>
			
						<div class="mb-4 w-32 mr-2">
							<label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">Prix unitaire</label>
							<input class="text-right mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" x-model="item.rate">
						</div>

						<div class="mb-4 w-32">
							<label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">Montant</label>
							<input class="text-right mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" x-model="item.total = item.qty * item.rate">
						</div>
					</div>
			
					<div class="mb-4 w-32"> 
						<div class="relative">
							<label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">TVA</label>
							<select class="text-gray-700 block appearance-none w-full bg-gray-200 border-2 border-gray-200 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500" x-model="item.TVA">
								<option value="20">TVA 20 %</option>
							</select>

						</div>
					</div>
	
					<div class="mt-8 text-right">
						<button type="button" class="bg-white hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 border border-gray-300 rounded shadow-sm mr-2" @click="openModal = !openModal">
							Annuler
						</button>	
						<button type="button" class="bg-white hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 border border-gray-700 rounded shadow-sm" @click="addItem()">
							Ajouter
						</button>	
					</div>
				</div>
			</div>
		</div>
		<!-- /Modal -->

	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
	<script>
        window.addEventListener('DOMContentLoaded', function() {
			const today = new Date();
		
            var picker = new Pikaday({
				keyboardInput: false,
				field: document.querySelector('.js-datepicker'),
				format: 'MMM D YYYY',
				theme: 'date-input',
				i18n: {
					previousMonth: "Prev",
					nextMonth: "Next",
					months: [
						"Jan",
						"Feb",
						"Mar",
						"Apr",
						"May",
						"Jun",
						"Jul",
						"Aug",
						"Sep",
						"Oct",
						"Nov",
						"Dec"
					],
					weekdays: [
						"Dimanche",
						"Lundi",
						"Mardi",
						"Mercredi",
						"Jeudi",
						"Vendredi",
						"Samedi"
					],
					weekdaysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"]
				}
			});
			picker.setDate(new Date());

			var picker2 = new Pikaday({
				keyboardInput: false,
				field: document.querySelector('.js-datepicker-2'),
				format: 'D MMM YYYY',
				theme: 'date-input',
				i18n: {
					previousMonth: "Prev",
					nextMonth: "Next",
					months: [
						"Jan",
						"Fev",
						"Mar",
						"Avr",
						"Mai",
						"Juin",
						"Juil",
						"Aou",
						"Sep",
						"Oct",
						"Nov",
						"Dec"
					],
					weekdays: [
						"Dimanche",
						"Lundi",
						"Mardi",
						"Mercredi",
						"Jeudi",
						"Vendredi",
						"Samedi"
					],
					weekdaysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sa"]
				}
			});
			picker2.setDate(new Date());
		});

		function invoices() {
			return {
				items: [],
				invoiceNumber: 0,
				invoiceDate: '',
				invoiceDueDate: '',

				totalTVA: 0,
                netTotal: 0,
                netTotalTVA: 0,

				item: {
					id: '',
					name: 'Site Vitrine',
					qty: 0,
					rate: 0,
					total: 0,
					TVA: 20
				},

				billing: {
					name: '',
					address: '',
					extra: ''
				},
				from: {
					name: '',
					address: '',
					extra: ''
				},

				showTooltip: false,
				showTooltip2: false,
				openModal: false,

				addItem() {
                    if (this.item.name && this.item.name == "Site Vitrine")
                        this.item.rate = 1500;
                    else if (this.item.name && this.item.name == "Site Ecommerce")
                    this.item.rate = 2000;
                    
					this.items.push({
                        id: this.generateUUID(),
                        name: this.item.name,
						qty: this.item.qty,
						rate: this.item.rate,
						TVA: this.calculateTVA(this.item.TVA, this.item.rate),
                        total: (this.item.qty * this.item.rate),
                        totalTVA: this.totalWithTVA(this.item.TVA, this.item.rate, (this.item.qty * this.item.rate)),
                    })
                    
					this.itemTotal();
                    this.itemTotalTVA();
                    this.totalTVA();

					this.item.id = '';
					this.item.name = '';
					this.item.qty = 0;
					this.item.rate = 0;
					this.item.TVA = 20;
					this.item.total = 0;
					this.item.totalTVA = 0;
				},

				deleteItem(uuid) {
					this.items = this.items.filter(item => uuid !== item.id);

					this.itemTotal();
                    this.itemTotalTVA();
                    this.totalWithTVA();
				},

				itemTotal() {
					this.netTotal = this.numberFormat(this.items.length > 0 ? this.items.reduce((result, item) => {
						return result + item.total;
					}, 0) : 0);
				},

				itemTotalTVA() {
                    this.totalTVA =  this.numberFormat(this.items.length > 0 ? this.items.reduce((result, item) => {
						return result + (item.TVA * item.qty);
					}, 0) : 0);
				},

				calculateTVA(TVAPercentage, itemRate) {
					return this.numberFormat((itemRate * TVAPercentage / 100).toFixed(2));
                },
                
                totalWithTVA(itemRate, TVAPercentage, total)
                {
                    this.netTotalTVA = this.numberFormat(this.items.length > 0 ? this.items.reduce((result, item) => {
						return total + itemRate * TVAPercentage / 100;
					}, 0) : total + itemRate * TVAPercentage / 100 * this.item.qty);
                    // this.netTotalTVA = this.numberFormat((total + itemRate * TVAPercentage / 100).toFixed(2));
                },  

				generateUUID() {
					return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
						var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
						return v.toString(16);
					});
				},

				generateInvoiceNumber(minimum, maximum) {
					const randomNumber = Math.floor(Math.random() * (maximum - minimum)) + minimum;
					this.invoiceNumber = '#INV-'+ randomNumber;
				},

				numberFormat(amount) {
					return amount.toLocaleString("fr-FR", {
						style: "currency",
						currency: "EUR"
					});
				},

				printInvoice() {
					var printContents = this.$refs.printTemplate.innerHTML;
					var originalContents = document.body.innerHTML;

					document.body.innerHTML = printContents;
					window.print();
					document.body.innerHTML = originalContents;
				}
			}
		}
	</script>
