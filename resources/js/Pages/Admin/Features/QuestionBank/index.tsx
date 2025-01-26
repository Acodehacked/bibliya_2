import DashboardLayout from '@/Layouts/DashboardLayout'
import React, { useState } from 'react'
import Header from '../../dashboard/components/Header'
import { Button } from '@mui/material'
import ExcelUploader from '@/Components/modals/ExcelUploader'
import { PageProps } from '@/types'

function index({questions}:PageProps<{questions:any[]}>) {
    const [excelopen, setexcelopen] = useState(false)
    return (
        <DashboardLayout title='Dashboard'>
            <ExcelUploader open={excelopen} setOpen={setexcelopen} />
            <Header title='Dashboard' list={['Dashboard', 'QuestionBank']} />

            <Button onClick={()=>setexcelopen(true)}>Excel Import</Button>

        </DashboardLayout>
    )
}

export default index