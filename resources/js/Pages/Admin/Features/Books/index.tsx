import DashboardLayout from '@/Layouts/DashboardLayout'
import React, { useState } from 'react'
import Header from '../../dashboard/components/Header'
import { Button } from '@mui/material'
import ExcelUploader from '@/Components/modals/ExcelUploader'
import { Book, PageProps } from '@/types'
import { Edit2, Trash2 } from 'lucide-react'

function index({ books }: PageProps<{ books: Book[] }>) {
    console.log(books)
    const [excelopen, setexcelopen] = useState(false)
    const [book, setbook] = useState<Book | null>(null)
    return (
        <DashboardLayout title='Dashboard'>
            <ExcelUploader open={excelopen} setOpen={setexcelopen} />
            <Header title='Books' list={['Dashboard', 'Books', 'Bible Books']} />
            <div>
                <Button variant='contained' onClick={() => setexcelopen(true)}>Excel Import</Button>
            </div>
            <div className="grid md:grid-cols-5 sm:grid-cols-3 grid-cold-1 w-full gap-3">
                {books.map((book, index) => (
                    <div key={index} className="p-3 border-[0.05rem] border-gray-300 rounded-md">
                        <h1 className='text-[1.4rem] font-bold'>{book.eng_name}</h1>
                        <h3 className='mal text-[1rem]'>{book.mal_name}</h3>
                        <h3 className='mal text-zinc-400'>{book.from.replaceAll('_', ' ') ?? ''}</h3>
                        <div className="flex justify-between items-center gap-2 mt-1">
                            <div className="flex w-50">
                                <p className='text-[12px]'>{book.publisher?.name}</p>
                            </div>
                            <div className="flex items-center gap-1">
                                <button className='bg-zinc-100 hover:bg-zinc-200 p-2 rounded-md border-[0.05rem] border-zinc-300'><Edit2 size={13} /></button>
                                <button className='bg-zinc-100 hover:bg-zinc-200 p-2 rounded-md border-[0.05rem] border-zinc-300'><Trash2 size={13} /></button>
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </DashboardLayout>
    )
}

export default index