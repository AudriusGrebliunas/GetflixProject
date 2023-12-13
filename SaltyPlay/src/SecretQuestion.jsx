import React from 'react'

export default function SecretQuestion() {
  return (
    <div className="flex flex-col items-center justify-center w-screen h-screen bg-gray-800">
    <div className="text-5xl font-bold text-white mb-3">SALTY</div>
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
         <button
          type="submit"
          className="bg-gray-600 text-white rounded mx-1 py-3 px-4 w-[30%]"
        >
          Check
        </button>
</div>
  )
}
