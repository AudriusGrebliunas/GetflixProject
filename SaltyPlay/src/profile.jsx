import React from 'react'

export default function profile() {
  return (
    <div className="min-h-screen flex items-center justify-center py-[100px] bg-gray-700">
      <form className="w-full max-w-lg">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-2xl font-semibold leading-7 text-white">Profile</h2>
            <p class="mt-1 text-sm leading-6 text-white">This information will be displayed publicly so be careful what you share.</p>
            </div>

            <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-white">Personal Information</h2>
            <p class="mt-1 text-sm leading-6 text-white">Use a permanent address where you can receive mail.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-white">First name</label>
                <div class="mt-2">
                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-white focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                </div>
                </div>

                <div class="sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium leading-6 text-white">Last name</label>
                <div class="mt-2">
                    <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                </div>
                </div>

                <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium leading-6 text-white">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-white focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                </div>
                </div>
                <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium leading-6 text-white">Date of birth</label>
                <div class="mt-2">
                    <input id="dob" name="dob" type="email" autocomplete="dob" class="block w-full rounded-md border-0 py-1.5 text-white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-white focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                </div>
                </div>

                <div class="col-span-full">
                <label for="street-address" class="block text-sm font-medium leading-6 text-white">Street address</label>
                <div class="mt-2">
                    <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-white-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-white-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                </div>
                </div>
                <div class="col-span-full">
                <label for="street-address" class="block text-sm font-medium leading-6 text-white">Password</label>
                <div class="mt-2">
                    <input type="password" name="password" id="password" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-white-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-white-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                </div>
                </div>
            </div>
            </div>

            <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-white">Notifications</h2>
            <p class="mt-1 text-sm leading-6 text-white">We'll always let you know about important changes, but you pick what else you want to hear about.</p>

            <div class="mt-10 space-y-10">
                <fieldset>
                <legend class="text-sm font-semibold leading-6 text-white">By Email</legend>
                <div class="mt-6 space-y-6">
                    <div class="relative flex gap-x-3">
                    <div class="flex h-6 items-center">
                        <input id="comments" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"/>
                    </div>
                    <div class="text-sm leading-6">
                        <label for="comments" class="font-medium text-white">Comments</label>
                        <p class="text-gray-200">Get notified when someones posts a comment on a posting.</p>
                    </div>
                    </div>
                    <div class="relative flex gap-x-3">
                    <div class="flex h-6 items-center">
                        <input id="candidates" name="candidates" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"/>
                    </div>
                    <div class="text-sm leading-6">
                        <label for="candidates" class="font-medium text-white">Candidates</label>
                        <p class="text-gray-200">Get notified when a candidate applies for a job.</p>
                    </div>
                    </div>
                    <div class="relative flex gap-x-3">
                    <div class="flex h-6 items-center">
                        <input id="offers" name="offers" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"/>
                    </div>
                    <div class="text-sm leading-6">
                        <label for="offers" class="font-medium text-white">Offers</label>
                        <p class="text-gray-200">Get notified when a candidate accepts or rejects an offer.</p>
                    </div>
                    </div>
                </div>
                </fieldset>
            </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-white-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            <button type="logout" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">log out</button>
        </div>

        </form>
    </div>
  )
}
