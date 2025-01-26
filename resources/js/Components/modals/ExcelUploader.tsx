import React from 'react'
import { AnimatePresence, motion } from 'motion/react'
import Modal from '../Modal'
import { Box, Typography } from '@mui/material'
function ExcelUploader({ open, setOpen,closable }: { open: boolean, setOpen: React.Dispatch<React.SetStateAction<boolean>>,closable?:boolean }) {
    return (
        <Modal
            show={open}
            closeable={closable ?? true} 
            onClose={()=>setOpen(false)}
            maxWidth='2xl'
            aria-labelledby="modal-modal-title"
            aria-describedby="modal-modal-description"
        >
            <div className='p-4 w-full'>
                <Typography id="modal-modal-title" variant="h6" component="h2">
                    Text in a modal
                </Typography>
                <Typography id="modal-modal-description" sx={{ mt: 2 }}>
                    Duis mollis, est non commodo luctus, nisi erat porttitor ligula.
                </Typography>
            </div>
        </Modal>
    )
}

export default ExcelUploader