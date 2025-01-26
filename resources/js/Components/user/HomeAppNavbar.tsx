import React from 'react'
import PropTypes from 'prop-types'
import { Link } from '@inertiajs/react'

function HomeAppNavbar() {
    return (
        <nav className='flex bg-zinc-50 fixed top-0 left-0 right-0'>
            <div className="flex w-full justify-between screen">
                <div className="flex items-center gap-1 ps-4 py-4">
                    <img className='bg-white w-[50px] rounded-xl' src='/storage/bibliya_logo.png' />
                    <span className='font-bold tracking-wider text-xl'>BIBLIYA</span>
                </div>
            </div>
            <div className="flex w-full justify-end p-3 py-2 items-center md:gap-[30px]">
                <div className="sm:flex hidden items-center gap-[30px]">
                    <a href="#" className="text-gray-600 hover:text-gray-800 rounded-xl bg-blue-200 px-3 py-1">Home</a>
                    <a href="#" className="text-gray-600 hover:text-gray-800">Notice Board</a>
                    <a href="#" className="text-gray-600 hover:text-gray-800">Install for Mobile</a>
                </div>
                <div className="flex items-center rounded-full bg-zinc-100">
                    <span className="text-yellow-500 px-3 font-semibold">299</span>
                    <img src="https://avatars.githubusercontent.com/u/124599?v=4" alt="Profile" className="w-12 h-12 rounded-full" />
                </div>
            </div>
        </nav>
    )
}

HomeAppNavbar.propTypes = {}

export default HomeAppNavbar
