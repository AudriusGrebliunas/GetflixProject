import React from "react";

export default function Register() {
return (
    <div className="h-screen w-screen bg-gray-800">
    <div className="h-[20%] w-full flex justify-center items-center">
        <p className="text-7xl font-bold tex-black mb-8">SALTY</p>
    </div>
    <div className="h-[80%] w-full flex justify-center items-center">
        <form class="w-full max-w-lg">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label
                class="block uppercase tracking-wide tex-black text-xs font-bold mb-2"
                for="grid-first-name"
            >
                First Name
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 tex-black border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                id="grid-first-name"
                type="text"
                placeholder="Jane"
            />
            <p class="text-red-500 text-xs italic">
                Please fill out this field.
            </p>
            </div>
            <div class="w-full md:w-1/2 px-3">
            <label
                class="block uppercase tracking-wide tex-black text-xs font-bold mb-2"
                for="grid-last-name"
            >
                Last Name
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 tex-black border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-last-name"
                type="text"
                placeholder="Doe"
            />
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <label
                class="block uppercase tracking-wide tex-black text-xs font-bold mb-2"
                for="grid-password"
            >
                Password
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 tex-black border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-password"
                type="password"
                placeholder="******************"
            />
            <p class="text-gray-600 text-xs italic">
                Make it as long and as crazy as you'd like
            </p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label
                class="block uppercase tracking-wide tex-black text-xs font-bold mb-2"
                for="grid-city"
            >
                Adress
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-white border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-city"
                type="text"
                placeholder="Av. Stallingrad"
            />
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label
                class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                for="grid-city"
            >
                E-mail
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-white border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-city"
                type="text"
                placeholder="incognito@gmail.com"
            />
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label
                class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                for="grid-zip"
            >
                Zip
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 tex-black border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-zip"
                type="text"
                placeholder="Date of Birth format DD/MM/YYYY"
            />
            </div>
        </div>
        <div className="w-full h-12 mt-5">
            <div class="w-full px-3 mb-6">
                <label
                    class="block uppercase tracking-wide tex-black text-xs font-bold mb-2"
                    for="grid-state"
                >
                    Secret Question
                </label>
                <div class="relative">
                    <select
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-black py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state"
                    >
                        <option>New Mexico</option>
                        <option>Missouri</option>
                        <option>Texas</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 tex-black">
                        <svg
                            class="fill-current h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap mt-[40px] mx-1">
            <div class="w-full px-3">
              <label
                class="block uppercase tracking-wide tex-black text-xs font-bold mb-2"
                for="grid-password"
              >
                Answer
              </label>
              <input
                class="appearance-none block w-full bg-gray-200 tex-black border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-password"
                type="password"
                placeholder="******************"
              />
            </div>
         </div>

        <div className="w-full flex items-center justify-center mt-4">
            <button
            type="submit"
            className="bg-gray-600 text-white rounded py-3 px-4 w-[30%] mt-3"
            >
            Register
            </button>
        </div>
        </form>
    </div>
    </div>
);
}
